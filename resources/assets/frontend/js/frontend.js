if (typeof App == "undefined") {
    const App = {};

    App.Wow = {
        init: function() {
            var wow = new WOW({
                boxClass: "wow",
                animateClass: "animate__animated",
                offset: 200,
                mobile: false,
                live: true,
            });
            wow.init();
        },
    };

    App.ResizeFacebookComment = {
        resize: function() {
            if ($(".fb-comments iframe").length <= 0) return;
            var src = $(".fb-comments iframe").attr("src").split("width=");
            width = $(".fb-comments").parent().width();

            $(".fb-comments iframe").attr("src", src[0] + "width=" + width);
        },
        init: function() {
            const Root = this;
            $(".fb-comments").attr(
                "data-width",
                $(".fb-comments").parent().width()
            );
            $(window).on("resize", function() {
                Root.resize();
            });
        },
    };

    App.MobileMenu = {
        mnav_panel: $("#nav-menu"),
        init: function() {
            let Root = this;
            $("body").on("click", "#nav-menu .dropdown", function() {
                $(this).find("ul.dropdown-menu").slideToggle("normal");
            });
            $(".panel-overlay").click(function() {
                Root.mnav_panel.toggleClass("opened");
                $(this).removeClass("active");
            });
            $("#showmenu").click(function() {
                Root.mnav_panel.toggleClass("opened");
                jQuery(".panel-overlay").toggleClass("active");
            });
        },
    };

    App.LazyLoadJS = {
        fb_app_id: document
            .querySelector("meta[property='fb:app_id']")
            .getAttribute("content"),
        zalo_chat_widget_lenght: $(".zalo-chat-widget").length,
        loadFB: function() {
            let Root = this;
            var js = document.createElement("script");
            js.src =
                "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=" +
                Root.fb_app_id +
                "&autoLogAppEvents=1";
            document.body.appendChild(js);
        },
        loadZaloChat: function() {
            var js = document.createElement("script");
            js.src = "https://sp.zalo.me/plugins/sdk.js";
            document.body.appendChild(js);
        },
        init: function() {
            const Root = this;
            window.onscroll = function() {
                if ($(window).scrollTop() > window.innerHeight) {
                    Root.loadFB();
                    if (Root.zalo_chat_widget_lenght > 0) {
                        Root.loadZaloChat();
                    }
                    window.onscroll = null;
                }
            };
        },
    };

    App.ScrollBtn = {
        click: function() {
            $("#bttop").on("click", function(e) {
                e.preventDefault(),
                    window.scrollTo({ top: 0, behavior: "smooth" });
            });
        },
        scroll: function() {
            let App = this;
            $(window).scroll(function() {
                if ($(this).scrollTop() > 0) {
                    $("#bttop").fadeIn();
                    App.click();
                } else {
                    $("#bttop").fadeOut();
                    App.click();
                }
            });
        },
        init: function() {
            let App = this;
            App.click();
            App.scroll();
        },
    };

    App.Pagination = {
        reBuildPaginate: function() {
            let Root = this;
            // var pagination = document.getElementsByClassName("pagination");
            // if (pagination.length > 0) {
            //     for (var i = 0; i < pagination.length; i++) {
            //         Root.buildPaginate(pagination[i]);
            //     }
            // }
            Root.thumbVideoResize();
            Root.thumbProductResize();
        },
        buildPaginate: function(pagi) {
            if (typeof pagi !== "undefined") {
                var lis = pagi.getElementsByTagName("li");
                var count_li = lis.length;
                for (var i = 0; i < count_li; i++) {
                    if (i == 0) {
                        var span_f = lis[0].getElementsByTagName("a");
                        if (typeof span_f[0] !== "undefined") {
                            span_f[0].innerHTML = "<";
                        } else {
                            var span_f = lis[0].getElementsByTagName("span");
                            span_f[0].innerHTML = "";
                        }
                    } else if (i == count_li - 1) {
                        var span_l = lis[i].getElementsByTagName("a");
                        if (typeof span_l[0] !== "undefined")
                            span_l[0].innerHTML = ">";
                        else {
                            var span_l = lis[i].getElementsByTagName("span");
                            span_l[0].innerHTML = "";
                        }
                    } else {
                        if (
                            lis[i].getAttribute("class") !== "page-item active"
                        ) {
                            lis[i].className += " normar";
                        } else {
                            var index_active = i;
                            console.log(index_active);
                        }
                    }
                }
                for (var i = 0; i < count_li; i++) {
                    if (index_active == 1 || index_active == 2) {
                        if (i > 4 && i < count_li - 2) lis[i].className = "dis";
                        else if (i == 4) {
                            lis[i].innerHTML = "...";
                            lis[i].className = "dot";
                        }
                    } else {
                        if (i == index_active - 2) {
                            lis[i].innerHTML = "...";
                            lis[i].className = "dot";
                        } else if (i == index_active + 2 && i != count_li - 1) {
                            lis[i].innerHTML = "...";
                            lis[i].className = "dot";
                        } else if (
                            (i > 1 && i < index_active - 1) ||
                            (i > index_active + 1 && i < count_li - 2)
                        ) {
                            lis[i].className = "dis";
                        }
                    }
                }
            }
        },

        thumbVideoResize: function() {
            if ($(".thumb-video").length == 0) return;
            $(".thumb-video").css("height", $(".thumb-video").width() * 0.565);
        },
        thumbProductResize: function() {
            if ($(".box-product1 .thumb").length == 0) return;
            $(".box-product1 .thumb").css(
                "height",
                $(".box-product1 .thumb").width()
            );
        },
        getData: function(page) {
            let Root = this;
            $.ajax({
                    url: "?page=" + page,
                    type: "get",
                    datatype: "html",
                })
                .done(function(data) {
                    $(".category_main").empty().html(data);
                    location.hash = page;
                    Root.reBuildPaginate();
                    window.scrollTo(0, 0);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert("No response from server");
                });
        },
        init: function() {
            if (document.getElementsByClassName("category_main").length == 0)
                return;

            let Root = this;
            Root.reBuildPaginate();
            $(window).on("hashchange", function() {
                if (window.location.hash) {
                    var page = window.location.hash.replace("#", "");
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    } else {
                        Root.getData(page);
                    }
                }
            });

            $(document).on("click", ".pagination a", function(event) {
                event.preventDefault();

                $("li").removeClass("active");
                $(this).parent("li").addClass("active");

                var myurl = $(this).attr("href");
                var page = $(this).attr("href").split("page=")[1];

                Root.getData(page);
            });
        },
    };

    App.SlideHome = {
        resizePC: function() {
            var ratio = 0.35;
            var width = $(window).width();
            $("#slidePc .swiper-slide").css("height", width * ratio);
        },
        resizeMobile: function() {
            var ratio = 0.65;
            var width = $(window).width();
            $("#slideMobile .swiper-slide").css("height", width * ratio);
        },
        initPC: function() {
            if ($("#slidePc .swiper-slide").length < 0) return;
            let Root = this;
            Root.resizePC();
            var slidePc = new Swiper("#slidePc", {
                preloadImages: false, //option for lazyload
                lazy: true, //option for lazyload
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".slidePc-next",
                    prevEl: ".slidePc-prev",
                },
                pagination: {
                    el: ".slidePc-pagi",
                },
            });
        },
        initMobile: function() {
            if ($("#slideMobile .swiper-slide").length < 0) return;
            let Root = this;
            Root.resizeMobile();
            var slideMobile = new Swiper("#slideMobile", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".slideMobile-next",
                    prevEl: ".slideMobile-prev",
                },
                pagination: {
                    el: ".slideMobile-pagi",
                },
            });
        },
        init: function() {
            let Root = this;
            Root.initPC();
            Root.initMobile();
        },
    };

    App.SidebarPostMenu = {
        boxClassTop: $("#submenuTop"),
        boxClass: $(".sidebar__submenu"),
        fixPoint: 0,
        init: function() {
            let Root = this;
            if ($(Root.boxClassTop).length > 0) {
                $(window).bind("scroll", function() {
                    var eTop = $(Root.boxClassTop).offset().top;
                    var curTop = eTop - $(window).scrollTop();
                    // console.log('eTop ' + eTop + ' curTop ' + curTop + ' w ' + $(window).scrollTop())
                    if (curTop < 20) {
                        fixPoint = $(window).scrollTop();
                        $(Root.boxClass).addClass("fixed");
                    } else {
                        $(Root.boxClass).removeClass("fixed");
                    }
                });
            }
        },
    };

    App.FormSearchSort = {
        init: function() {
            $("header .search-sort .btn-sch").on("click", function() {
                if (typeof isSearch == "undefined") isSearch = false;
                isSearch = !isSearch;
                if (isSearch) {
                    $("header .search-sort .content").css({
                        display: "block",
                    });
                } else {
                    $("header .search-sort .content").css({
                        display: "none",
                    });
                }
            });
        },
    };

    App.Product = {
        goToCart: function() {
            let Root = this;
            $("#cart").on("click", function(e) {
                e.preventDefault();
                window.location.href = "/checkout";
            });
        },

        addProduct: function() {
            let Root = this;
            $(".btn_add_to_cart").on("click", function(event) {
                event.preventDefault();
                var id = this.dataset.id;
                var qty = this.dataset.qty;
                var checkout = this.dataset.checkout;
                $("#product" + id).addClass("running");
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/api/addProduct",
                    type: "POST",
                    data: { id: id, qty: qty },
                    success: function(output) {
                        $("#product" + id).removeClass("running");
                        if (checkout != 1) {
                            document.getElementById("modalCartArea").innerHTML =
                                output.modalCart;
                            const modalCart = new bootstrap.Modal(
                                "#modalCart", {
                                    keyboard: false,
                                }
                            );
                            modalCart.show();
                            Root.changeCartCount(output.count);
                        } else {
                            window.location.href = "/checkout";
                        }
                    },
                });
            });
        },
        setCartCount: function() {
            if ($("#cart_count").length == 0) return;
            let Root = this;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/api/takeCartCount",
                type: "get",
                success: function(output) {
                    Root.changeCartCount(output);
                },
            });
        },
        changeCartCount: function(count) {
            $("#cart_count").html(count);
        },
        removeCart: function() {
            let Root = this;
            $(".cart__remove").on("click", function(e) {
                e.preventDefault();
                var rowid = this.dataset.rowid;
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/api/removeCart",
                    type: "POST",
                    data: { rowId: rowid },
                    success: function(output) {
                        Root.changeCartCount(output["cartCount"]);
                        $("#cart_table").html(output["cart_table"]);
                        Root.init();
                    },
                });
            });
        },
        changeItemNumber: function() {
            let Root = this;
            $(".btn_change_cart_item").on("click", function(e) {
                e.preventDefault();
                var rowid = this.dataset.rowid;
                var type = this.dataset.type;
                this.setAttribute("disabled", "");
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/api/changeItemNumber",
                    type: "POST",
                    data: { rowId: rowid, action: type },
                    success: function(output) {
                        Root.changeCartCount(output["cartCount"]);
                        $("#cart_table").html(output["cart_table"]);
                        Root.init();
                    },
                });
                this.removeAttribute("disabled", "");
            });
        },
        changeProductNumber: function() {
            let Root = this;
            var add_only = document.getElementsByClassName("add_only")[0];
            var and_checkout =
                document.getElementsByClassName("and_checkout")[0];
            $("#product_number .minus").on("click", function(e) {
                e.preventDefault();
                let number_p = parseInt(
                    document
                    .getElementById("product_number_value")
                    .innerHTML.trim()
                );
                if (number_p > 1) number_p = number_p - 1;
                document.getElementById("product_number_value").innerHTML =
                    number_p;
                add_only.dataset.qty = number_p;
                and_checkout.dataset.qty = number_p;
            });
            $("#product_number .plus").on("click", function(e) {
                e.preventDefault();
                let number_p = parseInt(
                    document
                    .getElementById("product_number_value")
                    .innerHTML.trim()
                );
                number_p = number_p + 1;
                document.getElementById("product_number_value").innerHTML =
                    number_p;
                add_only.dataset.qty = number_p;
                and_checkout.dataset.qty = number_p;
            });
        },
        init: function() {
            App.Product.setCartCount();
            App.Product.addProduct();
            App.Product.goToCart();
            App.Product.removeCart();
            App.Product.changeItemNumber();
            App.Product.changeProductNumber();
        },
    };
    App.ProductShow = {
        resize_thumb: function() {
            $(".thumb").css("height", $(".thumb").width());
        },
        layout_select: function() {
            $("#list_layout").on("click", function(e) {
                $("#grid_layout").removeClass("active");
                $("#grid_page").css("display", "none");
                $("#list_layout").addClass("active");
                $("#list_page").css("display", "block");
            });
        },
        grid_select: function() {
            $("#grid_layout").on("click", function(e) {
                $("#list_layout").removeClass("active");
                $("#grid_page").css("display", "block");
                $("#grid_layout").addClass("active");
                $("#list_page").css("display", "none");
            });
        },
        order_select: function() {
            let Root = this;
            $("#order_select").on("change", function(e) {
                Root.getProductList();
            });
        },
        size_select: function() {
            let Root = this;
            $("#size_select").on("change", function(e) {
                Root.getProductList();
            });
        },
        paginate_select: function() {
            let Root = this;
            $(document).on("click", "#paginate .item", function(event) {
                let page = this.dataset.page;
                console.log(page);
                document.getElementById("page").value = page;
                Root.getProductList();
            });
        },
        getProductList: function() {
            let Root = this;
            if (document.getElementById("order_select") == null) return;
            let order_select = document.getElementById("order_select").value;
            let size_select = document.getElementById("size_select").value;
            let term_id = document.getElementById("term_id").value;
            let page = 1;
            if (document.getElementById("page")) {
                page = document.getElementById("page").value;
            }
            let data = {};
            switch (order_select) {
                case "0":
                case "title_asc":
                    data["sort"] = "title";
                    data["order"] = "asc";
                    break;
                case "title_desc":
                    data["sort"] = "title";
                    data["order"] = "desc";
                    break;
                case "price_asc":
                    data["sort"] = "price";
                    data["order"] = "asc";
                    break;
                case "price_desc":
                    data["sort"] = "price";
                    data["order"] = "desc";
                    break;
            }
            data["page"] = page;
            data["size"] = size_select;
            data["term_id"] = term_id;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/api/getProduct",
                type: "post",
                data: data,
                success: function(out) {
                    document.getElementById("product_list").innerHTML = out;
                    Root.resize_thumb();
                    App.Product.addProduct();
                },
            });
        },
        init: function() {
            let Root = this;
            Root.getProductList();
            Root.layout_select();
            Root.grid_select();
            Root.order_select();
            Root.size_select();
            Root.paginate_select();
        },
    };
    App.Checkout = {
        self: $("#checkout_form"),
        alertError: function() {
            $("#checkout_form")
                .prepend(`<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 13H9.00001C8.45001 13 8.00001 12.55 8.00001 12C8.00001 11.45 8.45001 11 9.00001 11H15C15.55 11 16 11.45 16 12C16 12.55 15.55 13 15 13ZM12 2C6.48601 2 2.00001 6.486 2.00001 12C2.00001 17.514 6.48601 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2Z" fill="red"/>
                </svg>

                <div class="ml-2">
                <strong> Hệ thống không sẵn sàng.</strong> Bạn vui lòng thử lại sau.
                </div>
                </div>`);
        },
        submit: function() {
            let Root = this;

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                cache: false,
                url: "/api/placeOrder",
                data: Root.self.serialize(),
                dataType: "json",
                success: function(res) {
                    console.log(res);
                    if (res.code == 1) {
                        location.href = res.data.redirect;
                    } else if (res.code == 0) {
                        window.location.href = "/success/" + res.data.order_id;
                    } else if (res.code == 1) {
                        $("#checkoutBtn span").remove();
                        $("#checkoutBtn").attr("disabled", null);
                        Root.alertFeedback(res.data);
                        $([document.documentElement, document.body]).animate({
                                scrollTop: $(".is-invalid")[0].offsetTop + 69,
                            },
                            600
                        );
                    } else {
                        Root.alertError();
                    }
                },
                error: function() {
                    Root.alertError();
                },
            });
        },
        init: function() {
            const Root = this;
            $("#checkout_form").on("submit", function(e) {
                e.preventDefault();
                $("#checkoutBtn").prepend(
                    '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>'
                );
                // $('#checkoutBtn').attr('disabled', 'disabled')
                Root.submit();
            });
        },
    };

    App.Rating = {
        vote: function() {
            let App = this;
            $("#form-rating input").click(function(e) {
                e.preventDefault();
                var form = $("#form-rating");
                var url = form.attr("action");
                var data = form.serialize();
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "get",
                    success: function(out) {
                        $("#rating-area").html("");
                        $("#rating-area").html(out);
                        setTimeout(function() {
                            $("#confirm").remove();
                        }, 2000);
                        App.vote();
                    },
                });
            });
        },
        init: function() {
            App.Rating.vote();
        },
    };
    App.Comment = {
        post_id: $("#post_id").val(),
        loadComment: function() {
            let Root = this;
            if ($("#commentList").length > 0) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/api/getComment",
                    type: "POST",
                    data: { post_id: Root.post_id },
                    success: function(output) {
                        $("#commentList").html(output);
                        Root.initAction();
                    },
                });
            }
        },
        submit: function() {
            $("#btn_cmnt").click(function() {
                var post_id = $("#post_id").val();
                var parent = $("#parent").val();
                var name = $("#name").val();
                var phone = $("#phone").val();
                var content = $("#content").val();
                var data = [post_id, content, name, phone, parent];
                if (content == "" || name == "" || phone == "") {
                    if (content == "") $("#content").addClass("error");
                    if (name == "") $("#name").addClass("error");
                    if (phone == "") $("#phone").addClass("error");
                } else {
                    $("#content").removeClass("error");
                    $("#name").removeClass("error");
                    $("#phone").removeClass("error");

                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: "/api/createComment",
                        type: "POST",
                        data: { data: data },
                        success: function(output) {
                            console.log(output);
                            $("#name").val("");
                            $("#phone").val("");
                            $("#content").val("");
                        },
                    });
                }
            });
        },
        clear: function() {
            $("#close_cmt").click(function() {
                $("#close_cmt").css("display", "none");
                $("#commentBody #parent").val(0);
                $("#commentBody").insertAfter("#commentList");
            });
        },
        reply: function() {
            $(".comment-reply-link").on("click", function(e) {
                var commentID = $(this).data("commentid");
                console.log("commentID " + commentID);
                $("#commentBody #parent").val(commentID);
                $("#commentBody").insertAfter("#div-comment-" + commentID);
                $("#close_cmt").css("display", "block");
            });
        },
        initAction: function() {
            let Root = this;
            Root.submit();
            Root.clear();
            Root.reply();
        },
        init: function() {
            let Root = this;
            Root.loadComment();
        },
    };

    App.TranslateGoogle = {
        init: function() {
            $(".translation-links a").click(function() {
                var lang = $(this).data("lang");
                var $frame = $(".goog-te-menu-frame:first");
                // if (!$frame.size()) {
                //     alert("Error: Could not find Google translate frame.");
                //     return false;
                // }
                // $frame
                //     .contents()
                //     .find(
                //         '.goog-te-menu2-item span.text:contains("' + lang + '")'
                //     )
                //     .get(0)
                //     .click();
                $frame.contents().find(".goog-te-menu2-item").get(0).click();
                return false;
            });
        },
    };

    App.PostSubmenuToggle = {
        init: function() {
            $("#toggle_box").on("click", function(e) {
                e.preventDefault();
                $(".post__menu").toggle();
                const display =
                    document.getElementById("post_menu").style.display;
                const toggle_box = document.getElementById("toggle_box");
                if (display == "block") {
                    toggle_box.innerHTML = "Ẩn";
                } else {
                    toggle_box.innerHTML = "Hiện";
                }
                console.log(display);
            });
        },
    };

    App.Video = {
        popupShow: function() {
            $(".video_item").magnificPopup({
                type: "iframe",
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">' +
                        '<div class="mfp-close"></div>' +
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                        '<div class="mfp-title">Some caption</div>' +
                        "</div>",
                },
                callbacks: {
                    markupParse: function(template, values, item) {
                        values.title = item.el.attr("title");
                    },
                },
            });
        },
        init: function() {
            let Root = this;
            Root.popupShow();
        },
    };
    App.Received = {
        url: "/api/received",
        require_prefix: " - trường bắt buộc",
        form_id: "",
        messSuccess: "",
        inputErrClass: "error_input",
        btnReceivedCalss: ".btn_received",
        modalSuccess_mess: document.getElementById("modalSuccess_mess"),
        modalSuccess: new bootstrap.Modal("#modalSuccess", {
            keyboard: false,
        }),
        inputTypeForm(input) {
            return (
                input.type === "text" ||
                input.type === "number" ||
                input.tagName === "TEXTAREA"
            );
        },
        validate() {
            let Root = this;
            var form = document.getElementById(Root.form_id);
            var inputs = form.elements;
            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                if (
                    Root.inputTypeForm(input) &&
                    input.hasAttribute("required") &&
                    input.value === ""
                ) {
                    var placeholder = input.placeholder;
                    if (!placeholder.includes(Root.require_prefix)) {
                        placeholder += Root.require_prefix;
                    }
                    input.placeholder = placeholder;
                    input.classList.add(Root.inputErrClass);
                    return false;
                }
            }

            return true;
        },
        clearInputForm() {
            let Root = this;
            var form = document.getElementById(Root.form_id);
            var inputs = form.elements;
            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                if (Root.inputTypeForm(input)) {
                    var placeholder = input.placeholder;
                    placeholder = placeholder.replace(Root.require_prefix, "");
                    input.value = "";
                    input.placeholder = placeholder;
                    input.classList.remove(Root.inputErrClass);
                }
            }
        },
        handleSuccess() {
            let Root = this;
            Root.clearInputForm();
            Root.messSuccess = document.getElementById(
                Root.form_id
            ).elements.messSuccess.value;
            Root.modalSuccess_mess.innerHTML = Root.messSuccess;
            Root.modalSuccess.show();
            $(`#${Root.form_id} button[type=submit]`).prop("disabled", false);
            setTimeout(function() {
                Root.modalSuccess.hide();
            }, 2500);
        },
        submit(data) {
            let Root = this;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: Root.url,
                type: "POST",
                data: data,
                success: function(output) {
                    Root.handleSuccess();
                },
            }).fail(function(jqXHR, textStatus, error) {
                console.log("You are bot!!!!!!");
            });
        },
        init() {
            let Root = this;
            $(document).on("click", Root.btnReceivedCalss, function(e) {
                e.preventDefault();
                var key = this.dataset.key;
                var form_id = this.dataset.form;
                Root.form_id = form_id;
                if (Root.validate()) {
                    $(`#${form_id} button[type=submit]`).prop("disabled", true);
                    grecaptcha.ready(function() {
                        grecaptcha
                            .execute(key, {
                                action: "submit",
                            })
                            .then(function(token) {
                                var data = $(`#${form_id}`).serializeArray();
                                var captcha = {
                                    name: "g-recaptcha-response",
                                    value: token,
                                };
                                data.push(captcha);
                                Root.submit(data);
                            });
                    });
                }
            });
        },
    };

    for (const [key, value] of Object.entries(App)) {
        if (typeof value.init == "function") value.init();
    }
}