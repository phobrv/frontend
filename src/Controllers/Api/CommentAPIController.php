<?php

namespace Phont\Frontend\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\CommentRepository;
use Phobrv\BrvCore\Repositories\UserRepository;
use Phobrv\BrvCore\Services\UnitServices;

class CommentAPIController extends Controller
{
    protected $userRepository;

    protected $commentRepository;

    protected $unitService;

    public function __construct(
        CommentRepository $commentRepository,
        UserRepository $userRepository,
        UnitServices $unitService
    ) {
        $this->userRepository = $userRepository;
        $this->commentRepository = $commentRepository;
        $this->unitService = $unitService;
    }

    public function getComment(Request $request)
    {
        $post_id = $request->post_id;

        $data['comments'] = $this->commentRepository->findWhere(
            [
                'post_id' => $post_id,
                'parent' => '0',
                'status' => 'success',
            ]
        )->all();

        if (count($data['comments'])) {
            for ($i = 0; $i < count($data['comments']); $i++) {
                $c1 = $this->commentRepository->findWhere([
                    'parent' => $data['comments'][$i]->id,
                    'status' => 'success',
                ])->all();

                if (count($c1)) {
                    for ($j = 0; $j < count($c1); $j++) {
                        $c2 = $this->commentRepository->findWhere([
                            'parent' => $c1[$j]->id,
                            'status' => 'success',
                        ])->all();
                        if (count($c2)) {
                            $c1[$j]->child = $c2;
                        }
                    }
                }
                $data['comments'][$i]->child = $c1;
            }
        }

        return $this->renderComments($data['comments']);
    }

    public function createComment(Request $request)
    {
        $input = $request->all();
        $data = $input['data'];
        $comment = $this->commentRepository->create(
            [
                'post_id' => $data[0],
                'content' => $data[1],
                'name' => $data[2],
                'phone' => $data[3],
                'parent' => $data[4],
                'status' => 'pendding',
            ]
        );

        //Report alert have comment

        return $data[0];
    }

    public function renderComments($comments)
    {
        $out = '<ol class="commnet-list">';
        foreach ($comments as $c1) {
            $out .= '<li class="comment depth-1" id="comment-' . $c1->id . '">';
            $out .= $this->boxComment($c1);
            if (count($c1->child)) {
                $out .= '<ol class="children">';
                foreach ($c1->child as $c2) {
                    $out .= '<li class="comment depth-2" id="comment-' . $c1->id . '">';
                    $out .= $this->boxComment($c2);
                    if (isset($c2->child) && count($c2->child)) {
                        $out .= '<ol class="children">';
                        foreach ($c2->child as $c3) {
                            $out .= '<li class="comment depth-3" id="comment-' . $c1->id . '">';
                            $out .= $this->boxComment($c3, 'stop');
                            $out .= '</li>';
                        }
                        $out .= '</ol>';
                    }
                    $out .= '</li>';
                }
                $out .= '</ol>';
            }

            $out .= '</li>';
        }
        $out .= '</ol>';

        return $out;
    }

    public function boxComment($c1, $isNoReply = null)
    {
        $out = '<div id="div-comment-' . $c1->id . '" class="comment-body">';
        $out .= '<div class="comment-author">';
        $out .= '<img class="avatar" src="https://secure.gravatar.com/avatar/dd579cc2cffcf4069007475960ceece0?s=32&d=mm&r=g">';
        $out .= '<b class="fn">' . $c1->name . '</b>';
        if ($isNoReply == null) {
            $out .= '<span class="reply">' .
                '<i class="fa fa-reply" aria-hidden="true"></i> ' .
                '<a rel="nofollow" class="comment-reply-link" href="#comment-' . $c1->id . '" data-commentid="' . $c1->id . '" data-postid="' . $c1->post_id . '" >Trả lời</a></span>';
        }

        $out .= '</div>';
        $out .= '<p>' . $c1->content . '</p>';
        $out .= '</div>';

        return $out;
    }
}
