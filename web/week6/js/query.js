$(document).ready(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Select/Deselect checkboxes
  var checkbox = $('table tbody input[type="checkbox"]');
  $("#selectAll").click(function () {
    if (this.checked) {
      checkbox.each(function () {
        this.checked = true;
      });
    } else {
      checkbox.each(function () {
        this.checked = false;
      });
    }
  });
  checkbox.click(function () {
    if (!this.checked) {
      $("#selectAll").prop("checked", false);
    }
  });
});

$(function() {
  $('.delete').click(function() {
      e.preventDefault();
      var itemid = $(this).attr("delete_id");
      var location = "product-page.php?action=delete&itemid=" + itemid;
      window.location.href = location;
  });
  $('.edit').click(function() {
      e.preventDefault();
      var itemid = $(this).attr("edit_id");
      var location = "product-page.php?action=edit&itemid=" + itemid;
      window.location.href = location;
  });
  $('.update').click(function() {
      e.preventDefault();
      var itemid = $(this).attr("update_id");
      var location = "product-page.php?action=update&itemid=" + itemid;
      window.location.href = location;
  });
});
