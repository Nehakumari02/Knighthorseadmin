@php
    $default_lang_code   = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp

@if (admin_permission_by_name("admin.setup.sections.category.update"))
<div id="category-edit" class="mfp-hide large">
    <div class="modal-data">
        <div class="modal-header px-0">
            <h5 class="modal-title">{{ __("Edit Blog Category") }}</h5>
        </div>
        <div class="modal-form-data">
            <form class="card-form" action="{{ setRoute('admin.setup.sections.category.update')}}" method="POST">
                @csrf
                @method("PUT")
                <input type="hidden" name="target" value="{{ old('target') }}">
                <div class="row mb-10-none">
                    <div class="language-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach ($languages as $item)
                                    <button class="nav-link @if (get_default_language_code() == $item->code) active @endif" id="modal-{{$item->name}}-tab" data-bs-toggle="tab" data-bs-target="#modal-{{$item->name}}" type="button" role="tab" aria-controls="modal-{{ $item->name }}" aria-selected="true">{{ $item->name }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach ($languages as $item)
                                @php
                                    $lang_code = $item->code;
                                @endphp
                                <div class="tab-pane @if (get_default_language_code() == $item->code) fade show active @endif" id="modal-{{ $item->name }}" role="tabpanel" aria-labelledby="modal-{{$item->name}}-tab">
                                    <div class="col-xl-12 col-lg-12 form-group">
                                        @include('admin.components.form.input',[
                                            'label'         => __("Name")."*",
                                            'name'          => $item->code . "_name",
                                            'data_limit'    => 150,
                                            'placeholder'   => __("Write Name")."...",
                                            'value'         => old($lang_code . "_name"),
                                        ])
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.button.form-btn',[
                                'class'         => "w-100 btn-loading",
                                'permission'    => "admin.setup.sections.category.update",
                                'text'          => __("Update"),
                            ])
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@push('script')
    <script>
        openModalWhenError("category-edit","#category-edit");

        var default_language = "{{ $default_lang_code }}";
        var system_default_language = "{{ $system_default_lang }}";
        var languages = "{{ $languages_for_js_use }}";
        languages = JSON.parse(languages.replace(/&quot;/g,'"'));

        // edit item modal show with value
        $('.edit-modal-button').click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var editModal = $("#category-edit");

            editModal.find("form").first().find("input[name=target]").val(oldData.id);
            editModal.find("input[name="+default_language+"_name]").val(oldData.name.language[default_language].name);

            $.each(languages,function(index,item){
                editModal.find("input[name="+item.code+"_name]").val((oldData.name.language[item.code] == undefined ) ? '' : oldData.name.language[item.code].name);
            });
            openModalBySelector("#category-edit");
        });
    </script>
@endpush
