$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/* js Category */
$(document).ready(function () {
    var id_category;
    $('.edit-category').on('click', function () {
        let data = {
            id: $(this).attr('data-category_id'),
        };
        id_category = data['id'];
        $.ajax({
            type: 'POST',
            url: '/admin/ajax/get_category',
            data: data,
            success: function (res) {
              $('#categoryNameEdit').val(res.name);
              $('#descriptionEdit').html(res.description);
              $('option[value="' + res.parent_id + '"]').attr("selected","selected");
            }
        })
    })
    $('.submitEditCategory').on('click', function () {
        let data = {
            id: id_category,
            parent_id: $('#categoryParentEdit').val(),
            name: $('#categoryNameEdit').val(),
            description: $('#descriptionEdit').val(),
        };
        $.ajax({
            type: 'POST',
            url: '/admin/ajax/edit_category',
            data: data,
            success: function (res) {
                if (res['parent_id'] !== 0) {
                    $('li[data-id="' + res['parent_id'] + '"]').find('.dd-list').append('<ol class="dd-item dd3-item dd3-item-children" data-id="' + id_category + '"><div class="dd-handle dd3-handle"></div><div class="dd3-content"><a class="edit-category" data-toggle="modal" href="#modalEditCategory" data-category_id="' + id_category + '">' + res['name'] + '</a> <a class="icon_category btn-del-category" data-id="' + id_category + '"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a class="icon_category edit-category" data-toggle="modal" href="#modalEditCategory" data-category_id="' + id_category + '"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </div> </ol>')
                } else {
                    // coming soon parent_id == 0
                }
            }
        })
        $('li[data-id="' + id_category + '"]').remove();
    })
    $('.btn-del-category').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                let id = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: '/admin/ajax/delete_category',
                    data: {
                        'id': id,
                    },
                    success: function () {
                        $('li[data-id="' + id + '"]').remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        })
    })
})
