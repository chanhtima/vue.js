<!-- hash tag -->
<div class="card" style="<?= $config['hashtag'] ? '' : 'display: none;' ?>">
    <div class="card-body">
        <div class="mb-2">
            <div class="form-group">
                <label class="form-label">{{ __('content::admin.field.hashtag') }}</label>
                <select class="form-control select2multiple " id="hashtag" name="hashtag[]" multiple="true"
                    data-placeholder="{{ __('content::admin.field.hashtag_placeholder') }}">
                    <option value="">-- {{ __('content::admin.field.hashtag_placeholder') }} --</option>
                    @if (!empty($hashtag) && !empty($content->hashtag))
                        @foreach ($hashtag as $ht)
                            <option
                                {{ !empty($content->hashtag) && in_array($ht->id, json_decode($content->hashtag)) ? 'selected="selected"' : '' }}
                                value="{{ $ht->id }}">
                                {{ $ht->name_th }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>
<!-- .hash tag -->
