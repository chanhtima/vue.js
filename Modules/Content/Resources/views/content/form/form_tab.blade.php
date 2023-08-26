
<div class="panel panel-primary mb-3">
    <div class="tab_wrapper" id="category-content-form">
        <ul class="tab_list">
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i>
            </li>
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i>
            </li>
        </ul>
        <div class="content_wrapper">

            {{-- content.form.form_th --}}
            @include('content::content.form.form_th')
            {{-- .content.form.form_th --}}

            {{-- content.form.form_en --}}
            @include('content::content.form.form_en')
            {{-- .content.form.form_en --}}

        </div>
    </div>
</div>
