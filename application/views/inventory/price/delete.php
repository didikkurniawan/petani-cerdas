<div class="panel">

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for=""><strong>Jenis</strong></label> <br />
                    {{ vm.data.jenis }}
                </div>
                <div class="form-group">
                    <label for=""><strong>Nama Template</strong></label> <br />
                    {{ vm.data.template_name }}
                </div>
            </div>
            <div class="col-lg-9">
                <div class="form-group">
                    <label for=""><strong>Template</strong></label> <br />
                    <div ng-bind-html="vm.data.template">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>