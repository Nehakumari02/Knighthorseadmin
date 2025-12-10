<script>
    $(document).on("click", ".logout-btn", function(event) {
        event.preventDefault();
        var actionRoute = "{{ setRoute('admin.logout') }}";
        var target = "auth()->user()->id";
        var message = `{{ __('Are you sure to') }} <strong>{{ __('Logout') }}</strong>?`;
        openDeleteModal(actionRoute, target, message, "{{ __('Logout') }}", "POST");
    });

    function openDeleteModal(URL, target, message, actionBtnText = "Remove", method = "DELETE") {
        if (URL == "" || target == "") {
            return false;
        }

        if (message == "") {
            message = "Are you sure to delete ?";
        }
        var method = `<input type="hidden" name="_method" value="${method}">`;
        openModalByContent({
                content: `<div class="card modal-alert border-0">
                        <div class="card-body">
                            <form method="POST" action="${URL}">
                                <input type="hidden" name="_token" value="${laravelCsrf()}">
                                ${method}
                                <div class="head mb-3">
                                    ${message}
                                    <input type="hidden" name="target" value="${target}">
                                </div>
                                <div class="foot d-flex align-items-center justify-content-between">
                                    <button type="button" class="modal-close btn btn--info">{{ __('Close') }}</button>
                                    <button type="submit" class="alert-submit-btn btn btn--danger btn-loading">${actionBtnText}</button>
                                </div>
                            </form>
                        </div>
                    </div>`,
            },

        );
    }

    function openModalByContent(data = {
        content: "",
        animation: "mfp-move-horizontal",
        size: "medium",
    }) {
        $.magnificPopup.open({
            removalDelay: 500,
            items: {
                src: `<div class="white-popup mfp-with-anim ${data.size ?? "medium"}">${data.content}</div>`, // can be a HTML string, jQuery object, or CSS selector
            },
            callbacks: {
                beforeOpen: function() {
                    this.st.mainClass = data.animation ?? "mfp-move-horizontal";
                },
                open: function() {
                    var modalCloseBtn = this.contentContainer.find(".modal-close");
                    $(modalCloseBtn).click(function() {
                        $.magnificPopup.close();
                    });
                },
            },
            midClick: true,
        });
    }

    function laravelCsrf() {
        return $("head meta[name=csrf-token]").attr("content");
    }
</script>
