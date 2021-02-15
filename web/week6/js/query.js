//triggered when modal is about to be shown
// $('#editProductModal').on('show.bs.modal', function(e) {

//   //get data-id attribute of the clicked element
//   var bookId = $(e.relatedTarget).data('data-id');
//   console.log(bookId)

//   //populate the textbox
//   $(e.currentTarget).find('input[name="code"]').val(bookId);
// });

$(document).ready(function() {
  $('.edit-product').click(function () {
    var data_id = '';
    if (typeof $(this).data('id') !== 'undefined') {
      console.log('WE are in')
      data_id = $(this).data('id');
      console.log(data_id)
    }
    $('#edit-code').val($(this).data('id'));
    $('#edit-name').val($(this).data('name'));
    $('#edit-image').val($(this).data('image'));
    $('#edit-quantity').val($(this).data('quantity'));
    $('#edit-price').val($(this).data('price'));
  })

  $('.delete').click(function () {
    var data_id = '';
    if (typeof $(this).data('id') !== 'undefined') {
      data_id = $(this).data('id');
      console.log(data_id)
    }
    $('#idDelete').text($(this).data('id'));
  })

  $('#deleteAccepted').click(function() {
    var itemid = $('#idDelete').text();
    console.log(itemid)
    var location = "product-page.php?action=delete&itemid=" + itemid;
    window.location.href = location;
});
});