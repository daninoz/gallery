<div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myLargeModalLabel">Find Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-4">
                        {{ Form::text('find', null, ['class' => 'form-control input-find', 'id' => 'find-image', 'autocomplete' => 'off']) }}
                    </div>
                </div>
                <div class="row multi-columns-row images">
                </div>
            </div>
        </div>
    </div>
</div>