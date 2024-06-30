<!-- Page specific script -->
<script>

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "progressBar": false,
    "preventDuplicates": true,
    "positionClass": "toast-top-center",
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "4000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };

  <?php if($this->session->flashdata('success')){ ?>
      toastr.success("<?php echo $this->session->flashdata('success'); ?>");
  <?php }else if($this->session->flashdata('error')){  ?>
      toastr.error("<?php echo $this->session->flashdata('error'); ?>");
  <?php }else if($this->session->flashdata('warning')){  ?>
      toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
  <?php }else if($this->session->flashdata('info')){  ?>
      toastr.info("<?php echo $this->session->flashdata('info'); ?>");
  <?php } ?>

  // untuk download data tabel
  $(function () {

    const months = ["JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"];

    var currentDate = new Date()
    var month = months[currentDate.getMonth()]
    var next_month = months[currentDate.getMonth() + 1]
    var year = currentDate.getFullYear()

    var d = month + " " + year;
    var n = next_month + " " + year;

    $("#tb_obat").DataTable({
      "responsive": true, "lengthChange": true,
      "lengthMenu": [[ 10, 50, 100, 200, -1 ], [ 10, 50, 100, 200, "All" ]],
      "autoWidth": true, 
      "buttons": [
      {
          extend: 'excelHtml5',
          title: '',
          // filename: 'DATA OBAT',
          filename: 'DAFTAR OBAT',

          customize: function(xlsx) {
          var sheet = xlsx.xl['styles.xml'];
          var tagName = sheet.getElementsByTagName('sz');
          for (i = 0; i < tagName.length; i++) {
            tagName[i].setAttribute("val", "10")
          }
          var tagName = sheet.getElementsByTagName('name');
          for (i = 0; i < tagName.length; i++) {
            tagName[i].setAttribute("val", "Arimo")
          }
          console.log(tagName)
        }
      },
      {
          extend: 'pdfHtml5',
          orientation: 'landscape',
          pageSize: 'A4',
          title: '',
          filename: 'DAFTAR OBAT'
      },
      "colvis"],
    }).buttons().container().appendTo('#tb_obat_wrapper .col-md-6:eq(0)');

    $('#tb_kdl').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[ 10, 50, 100, 200, -1 ], [ 10, 50, 100, 200, "All" ]],
      "searching": true,
      "ordering": false, // untuk filtering
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    $("#tb_analisis").DataTable({
    "responsive": false,
    "lengthChange": true,
    "lengthMenu": [[ 10, 50, 100, 200, -1 ], [ 10, 50, 100, 200, "All" ]],
    "autoWidth": true,
    "scrollX": true,
    "buttons": [

    {
        extend: 'excelHtml5',
        title: '',
        // filename: 'ANALISIS RAB ' + n,
        filename: 'ANALISIS RAB',

        customize: function(xlsx) {
          var sheet = xlsx.xl['styles.xml'];
          var tagName = sheet.getElementsByTagName('sz');
          for (i = 0; i < tagName.length; i++) {
            tagName[i].setAttribute("val", "10")
          }
          var tagName = sheet.getElementsByTagName('name');
          for (i = 0; i < tagName.length; i++) {
            tagName[i].setAttribute("val", "Arimo")
          }
          console.log(tagName)
        }
    },
    {
        extend: 'pdfHtml5',
        orientation: 'landscape',
        pageSize: 'A4',
        title: '',
        // filename: 'ANALISIS RAB ' + n
        filename: 'ANALISIS RAB'
    },
    "colvis"],
    }).buttons().container().appendTo('#tb_analisis_wrapper .col-md-6:eq(0)');

    $("#tb_prediksi").DataTable({
      "responsive": true, "lengthChange": true,
      "lengthMenu": [[ 10, 50, 100, 200, -1 ], [ 10, 50, 100, 200, "All" ]],
      "autoWidth": true, 
      "buttons": [
      {
          extend: 'excelHtml5',
          title: '',
          // filename: 'PREDIKSI KEBUTUHAN ' + n,
          filename: 'PREDIKSI KEBUTUHAN',

          customize: function(xlsx) {
          var sheet = xlsx.xl['styles.xml'];
          var tagName = sheet.getElementsByTagName('sz');
          for (i = 0; i < tagName.length; i++) {
            tagName[i].setAttribute("val", "10")
          }
          var tagName = sheet.getElementsByTagName('name');
          for (i = 0; i < tagName.length; i++) {
            tagName[i].setAttribute("val", "Arimo")
          }
          console.log(tagName)
        }
      },
      {
          extend: 'pdfHtml5',
          orientation: 'landscape',
          pageSize: 'A4',
          title: '',
          // filename: 'PREDIKSI KEBUTUHAN ' + n
          filename: 'PREDIKSI KEBUTUHAN'
      },
      "colvis"],
    }).buttons().container().appendTo('#tb_prediksi_wrapper .col-md-6:eq(0)');

    $('#example4').DataTable({
      "paging": false,
      "lengthChange": true,
      "lengthMenu": [[ 10, 50, 100, 200, -1 ], [ 10, 50, 100, 200, "All" ]],
      "searching": false,
      "ordering": false, // untuk filtering
      "info": false,
      "autoWidth": true,
      "responsive": true,
    });
  });


      /*var $last_select = null;
  $(document).ready(function(){
      $("select[name^=nm_obat]").change(function(){
          $last_select = $(this);
          $('input[name^=stn_kcl]', $last_select.parent()).val('something');
      });
  });*/

   // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })


  /** untuk form saat input text maka input file akan disable dan sebaliknya **/
  $(function () {
    bsCustomFileInput.init();
  });

  $("#nm_obat").on('keyup blur', function(){
          if($.trim($("#nm_obat").val())){
            $('#im_obat').attr("disabled", "disabled");
        }else{$('#im_obat').removeAttr('disabled');}
    });
  $('[name="jns_obat"]').change(function() {
    if($(this).val()=="Yes")
       $('#im_obat').removeAttr('disabled');
    else
       $('#im_obat').attr('disabled','disabled');
   });
  $('[name="stn_kcl"]').change(function() {
    if($(this).val()=="Yes")
       $('#im_obat').removeAttr('disabled');
    else
       $('#im_obat').attr('disabled','disabled');
   });

  $("#im_obat").on("change", function(){
      if($.trim($("#im_obat").val())){
        $('#nm_obat').attr("disabled", "disabled"),
        $('#jns_obat').attr("disabled", "disabled"),
        $('#stn_kcl').attr("disabled", "disabled")
    }else{$('#nm_obat').removeAttr('disabled'),
          $('#jns_obat').removeAttr('disabled'),
          $('#stn_kcl').removeAttr('disabled')
        }
});
  /** akhir dari code form input disable **/

  /** untuk style select option agar dapat disearch dan datepicker **/
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()


    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate1').datetimepicker({
        format: 'MM-YYYY'
    });
    $('#reservationdate2').datetimepicker({
         format: 'YYYY'
    });
    $('#reservationdate3').datetimepicker({
         format: 'MM-YYYY'
    });

    //Date range picker
    $('#reservation').daterangepicker()

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

  })

var xValues = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [1000,750,200,190,20,70,0,110,1604,200,0,210],
      borderColor: "#638ec9",
      fill: false
    },{
      data: [600,700,3200,1900,2000,700,400,500,600,700,100,0],
      borderColor: "#c9c9c9",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});

</script>
