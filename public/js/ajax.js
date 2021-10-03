$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


//----- [ button click function ] ----------
$("#createBtn").click(function(event) {
  event.preventDefault();
  $(".error").remove();
  $(".alert").remove();

  var nama = $("#nama").val();
  var logo = $("#logo").val();
  var email = $("#email").val();
  var website = $("#website").val();
  var alamat = $("#alamat").val();

  if(nama == "") {
      $("#nama").after('<span class="text-danger error"> Title is required </span>');
  }

  if(logo == "") {
      $("#logo").after('<span class="text-danger error"> Description is required </span>');
  }

  if(email == "") {
    $("#email").after('<span class="text-danger error"> Description is required </span>');
  }

  if(website == "") {
    $("#website").after('<span class="text-danger error"> Description is required </span>');
  }

  if(alamat == "") {
    $("#alamat").after('<span class="text-danger error"> Description is required </span>');
  }

  var form_data =  $("#companyForm").serialize();

  // if post id exist
  if($("#id_hidden").val() !="") {
      updateCompany(form_data);
  }

  // else create post
  else {
      createCompany(form_data);
  }
});


// create new post
function createCompany(form_data) {
  $.ajax({
      url: '{{ route("company.store" )}}',
      method: 'POST',
      data: form_data,
      dataType: 'json',

      beforeSend:function() {
          $("#createBtn").addClass("disabled");
          $("#createBtn").text("Processing..");
      },

      success:function(res) {
          $("#createBtn").removeClass("disabled");
          $("#createBtn").text("Save");

          if(res.status == "success") {
              $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
          }

          else if(res.status == "failed") {
              $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
          }
      },
  });
}

// update post
function updateCompany(form_data) {
  $.ajax({
      url: 'company',
      method: 'put',
      data: form_data,
      dataType: 'json',

      beforeSend:function() {
          $("#createBtn").addClass("disabled");
          $("#createBtn").text("Processing..");
      },

      success:function(res) {
          $("#createBtn").removeClass("disabled");
          $("#createBtn").text("Update");

          if(res.status == "success") {
              $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
          }

          else if(res.status == "failed") {
              $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
          }
      }
  });
}

// ---------- [ Delete post ] ----------------
function deleteCompany(company_id) {
  var status = confirm("Do you want to delete this Company ?");
  if(status == true) {
      $.ajax({
          url: "company/"+company_id,
          method: 'delete',
          dataType: 'json',

          success:function(res) {
              if(res.status == "success") {
                  $("#result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
              }
              else if(res.status == "failed") {
                  $("#result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
              }
          }
      });
  }
}

$('#addCompanyModal').on('shown.bs.modal', function (e) {
var id      = $(e.relatedTarget).data('id');
var nama    = $(e.relatedTarget).data('nama');
var logo    = $(e.relatedTarget).data('logo');
var email   = $(e.relatedTarget).data('email');
var website = $(e.relatedTarget).data('website');
var alamat  = $(e.relatedTarget).data('alamat');

if(action !== undefined) {

  if(action === "view") {

    // set modal title
    $(".modal-title").html("Post Detail");

    // pass data to input fields
      $("#nama").removeAttr("readonly", "true");
      $("#nama").val(nama);
      $("#logo").removeAttr("readonly", "true");
      $("#logo").val(logo);
      $("#email").removeAttr("readonly", "true");
      $("#email").val(email);
      $("#website").removeAttr("readonly", "true");
      $("#website").val(website);
      $("#alamat").removeAttr("readonly", "true");
      $("#alamat").val(alamat);

    // hide button
    $("#createBtn").addClass("d-none");
}
  
  if(action === "edit") {
      $("#nama").removeAttr("readonly");
      $("#logo").removeAttr("readonly");
      $("#email").removeAttr("readonly");
      $("#website").removeAttr("readonly");
      $("#alamat").removeAttr("readonly");

      // set modal title
      $(".modal-title").html("Update Company");

      $("#createBtn").text("Update");

       // pass data to input fields
       $("#id_hidden").val(id);
       $("#nama").val(nama);
       $("#logo").val(logo);
       $("#email").val(email);
       $("#website").val(website);
       $("#alamat").val(alamat);
       

       // hide button
      $("#createBtn").removeClass("d-none");
  }
}

else {
  $(".modal-title").html("Add Data Company");

  // pass data to input fields
  $("#nama").removeAttr("readonly");
  $("#nama").val("");
  $("#logo").removeAttr("readonly");
  $("#logo").val("");
  $("#email").removeAttr("readonly");
  $("#email").val("");
  $("#website").removeAttr("readonly");
  $("#website").val("");
  $("#alamat").removeAttr("readonly");
  $("#alamat").val("");

  // hide button
  $("#createBtn").removeClass("d-none");
}
});