

    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit-form" data-id="{{$cat->id}}">
                @csrf
                @method('put')
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name"> أسم التصنيف :</label>
                        <input type="text" name="name" class="form-control" value="{{$cat->name}}">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">أغلاق</button>
                    <button name="submit" type="button" id="save_edit" class="btn btn-success">حفظ التغيرات</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
