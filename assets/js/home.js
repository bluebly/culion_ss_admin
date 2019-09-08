$(document).ready(function() {
  'use strict';
  
  function openTab(e) {
    $('.tabcontent').css('display', 'none');
    $('#' + e.attr('def')).css('display', 'block');

    $('.tablinks').removeClass("active");
    e.addClass("active");
  }

  $('.tablinks').click(function() {
    openTab($(this));
  });

  // Get the element with id="defaultOpen" and click on it
  $("#defaultOpen").click();

  // requestApproval
  function renderRequestTable(requests) {
    $('#tblRequest > tbody > tr').remove();
    $.each(requests, function(i, v) {
      $('#tblRequest > tbody').append(
        "<tr class='request' firstName='" + v.REQ_FNAME + "' middleName='" + 
            v.REQ_MNAME + "' lastName='" + v.REQ_LNAME+ "' relation='" + 
            v.REQ_RELATION + "' address='" + v.REQ_ADDRESS + "' mobileNo='" + 
            v.REQ_MOBILE_NO + "' emailAddress='" + v.REQ_EMAIL_ADD + "' purpose='" + 
            v.REQ_PURPOSE + "' dateRequested='" + v.DATE_REQUESTED + "' status='" + v.STATUS + "'>" +
          "<td class='text-center'>" + v.REF_NO + "</td>" +
          "<td class='text-center'>" + v.NAME + "</td>" +
          "<td class='text-center'>" + v.P_NAME + "</td>" +
          "<td class='text-center'>" + v.STATUS + "</td>" +
        "</tr>"
      );
    });
    $('#totalCount').text(requests.length);
  }

  function setDetails(e) {
    var rowDetails = e.children();
    $('#viewReferenceNumber').val(rowDetails.eq(0)[0].innerText);
    $('#viewRequestedPatient').val(rowDetails.eq(2)[0].innerText);
    $('#viewFirstName').val(e.attr('firstName'));
    $('#viewMiddleName').val(e.attr('middleName'));
    $('#viewLastName').val(e.attr('lastName'));
    $('#viewRelation').val(e.attr('relation'));
    $('#viewAddress').val(e.attr('address'));
    $('#viewMobileNo').val(e.attr('mobileNo'));
    $('#viewEmailAddress').val(e.attr('emailAddress'));
    $('#viewPurpose').val(e.attr('purpose'));
    $('#viewDateRequested').val(e.attr('dateRequested'));
    $('#viewStatus').val(e.attr('status'));

    if (e.attr('status').toString().toUpperCase() == 'PENDING') {
      $('#responseGroup').css('display', 'block');
    } else {
      $('#responseGroup').css('display', 'none');
    }
  }

  $('#btnSearch').click(function() {
    $('#loadingText').text('Search in progress.. Please Wait..');
    $('#spinner').modal('show');
    $.ajax({
      type: 'POST',
      url: '../services/RequestService.php',
      data: {
        referenceNumber: $('#referenceNumber').val(),
        requestorName: $('#requestorName').val(),
        requestedPatient: $('#requestedPatient').val(),
        dateRequested: $('#dateRequested').val(),
        requestStatus: $('#requestStatus').val(),
        action: 'SEARCH'
      }
    }).done(function(response) {
      renderRequestTable(JSON.parse(response));
      hideModal();
      $('.request').click(function() {
        toggleRequestApprovalPage(false);
        setDetails($(this));
      });
    });
  });

  $('#btnClear').click(function() {
    $('#referenceNumber').val('');
    $('#requestorName').val('');
    $('#requestedPatient').val('');
    $('#dateRequested').val('');
    $('#requestStatus').val('');
    $('#tblRequest > tbody > tr').remove();
    $('#totalCount').text(0);
  });

  $('#btnSearch').click();

  function toggleRequestApprovalPage(show) {
    $('#requestApprovalPage').css('display', show ? 'block' : 'none');
    $('#requestDetailsPage').css('display', show ? 'none' : 'block');
  }

  $('#backRequest').click(function() {
    toggleRequestApprovalPage(true);
  });

  function displayApprove() {
    console.log('Display approve');
    $('#headerMessage').removeClass('text-danger');
    $('#message').removeClass('text-danger');
    $('#responseIcon').removeClass('text-danger');
    $('#responseIcon').removeClass('fa-times');
    $('#headerMessage').addClass('text-success');
    $('#message').addClass('text-success');
    $('#responseIcon').addClass('fa-check');
    $('#responseIcon').addClass('text-success');
    $('#headerMessage').text('Request approved!');
    $('#message').text("Patient's record is now exported to PDF");
    $('#responseModal').modal('show');
  }

  function displayReject() {
    console.log('Display reject');
    $('#headerMessage').removeClass('text-success');
    $('#message').removeClass('text-success');
    $('#responseIcon').removeClass('text-success');
    $('#responseIcon').removeClass('fa-check');
    $('#headerMessage').addClass('text-danger');
    $('#message').addClass('text-danger');
    $('#responseIcon').addClass('fa-times');
    $('#responseIcon').addClass('text-danger');
    $('#headerMessage').text('Request rejected!');
    $('#message').text('');
    $('#responseModal').modal('show');
  }

  function respond(isApprove) {
    var status = isApprove ? 1 : 2;
    console.log('waow');
    $.ajax({
      type: 'POST',
      url: '../services/RequestService.php',
      data: {
        referenceNumber: $('#viewReferenceNumber').val(),
        response: status,
        action: 'RESPOND'
      }
    }).done(function(response) {
      console.log(response);
      if (response == 'Y') {
        toggleRequestApprovalPage(true);
        $('#responseModal').modal({backdrop: 'static', keyboard: false})  
        if (isApprove)
          displayApprove();
        else
          displayReject();
      }
    });
  }

  $('#btnApprove').click(function() {
    console.log('waow');
    respond(true);
  });

  $('#btnReject').click(function() {
    respond(false);
  });

  $('#btnResponseOk').click(function() {
    $('#btnSearch').click();
  });

  toggleRequestApprovalPage(true);
}());