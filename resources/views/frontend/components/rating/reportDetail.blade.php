<ul class="report-detail">
    <li>
        @include('phont::frontend.components.rating.ratingShow', ['rating' => 5, 'disabled' => 'disabled'])
        @include('phont::frontend.components.rating.process', ['value' => $data['rating5']])
    </li>
    <li>
        @include('phont::frontend.components.rating.ratingShow', ['rating' => 4, 'disabled' => 'disabled'])
        @include('phont::frontend.components.rating.process', ['value' => $data['rating4']])
    </li>
    <li>
        @include('phont::frontend.components.rating.ratingShow', ['rating' => 3, 'disabled' => 'disabled'])
        @include('phont::frontend.components.rating.process', ['value' => $data['rating3']])
    </li>
    <li>
        @include('phont::frontend.components.rating.ratingShow', ['rating' => 2, 'disabled' => 'disabled'])
        @include('phont::frontend.components.rating.process', ['value' => $data['rating2']])
    </li>
    <li>
        @include('phont::frontend.components.rating.ratingShow', ['rating' => 1, 'disabled' => 'disabled'])
        @include('phont::frontend.components.rating.process', ['value' => $data['rating1']])
    </li>

</ul>