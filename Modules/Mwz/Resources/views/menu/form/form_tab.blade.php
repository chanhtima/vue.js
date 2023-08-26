
<div class="panel panel-primary">
    <div class="tab_wrapper" id="menu-form">
        <ul class="tab_list">
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i>
            </li>
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i>
            </li>
        </ul>
        <div class="content_wrapper">
         
            {{-- category.form.form_th --}}
            @include('mwz::menu.form.form_th')
            {{-- .category.form.form_th --}}

            {{-- category.form.form_en --}}
            @include('mwz::menu.form.form_en')
            {{-- .category.form.form_en --}}

        </div>
    </div>
</div>
