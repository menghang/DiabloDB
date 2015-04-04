<div class="modal fade" id="{{ $div_name }}" tabindex="-1" role="dialog" aria-labelledby="{{ $div_name . 'label' }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="{{ $div_name . 'label' }}">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                @if (isset($flash_id))
                    <div id="{{ $flash_id }}" class="alert" style="display: none;"></div>
                @endif

                <?php echo $content; ?>
            </div>
            <div class="modal-footer">
                @if (isset($footer_content))
                    <?php echo $footer_content; ?>
                @endif
                @if (isset($options) && array_key_exists('hide_default_buttons', $options) && $options['hide_default_buttons'] !== true)
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                @endif
            </div>
        </div>
    </div>
</div>