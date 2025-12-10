<div id="category-add" class="mfp-hide large">
    <div class="modal-data">
        <div class="modal-header px-0">
            <h5 class="modal-title">{{ __("Add Blog Category") }}</h5>
        </div>
        <div class="modal-form-data">
            <form class="card-form" action="{{ setRoute('admin.setup.sections.category.store')}}" method="POST">
                @csrf
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
                                'permission'    => "admin.setup.sections.category.store",
                                'text'          => __("Add"),
                            ])
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
