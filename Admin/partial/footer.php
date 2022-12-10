<!-- jquery vendor -->
<script src="<?=BASE_URL ?>Admin/js/lib/jquery.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="<?=BASE_URL ?>Admin/js/lib/menubar/sidebar.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/preloader/pace.min.js"></script>
<!-- sidebar -->

<script src="<?=BASE_URL ?>Admin/js/lib/bootstrap.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/scripts.js"></script>
<!-- bootstrap -->

<script src="<?=BASE_URL ?>Admin/js/lib/calendar-2/moment.latest.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/calendar-2/pignose.calendar.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/calendar-2/pignose.init.js"></script>


<script src="<?=BASE_URL ?>Admin/js/lib/weather/jquery.simpleWeather.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/weather/weather-init.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/circle-progress/circle-progress.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/circle-progress/circle-progress-init.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/chartist/chartist.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/sparklinechart/sparkline.init.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/owl-carousel/owl.carousel-init.js"></script>
<!-- scripit init-->
<script src="<?=BASE_URL ?>Admin/js/dashboard2.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/datatables.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/buttons.flash.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/jszip.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/pdfmake.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?=BASE_URL ?>Admin/js/lib/data-table/datatables-init.js"></script>
<script src="<?=BASE_URL ?>Admin/js/pr.js"></script>
<script src="<?=BASE_URL ?>Admin/js/sweetalert.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<?php 
    if (isset ($_SESSION['message'])) 
        {
        ?>

<script>
swal({
    title: "<?php  echo $_SESSION['message']; ?>",
    // text: "You clicked the button!",
    icon: "success",
    button: "Done!",
});
</script>
<?php        
            unset($_SESSION['message']);
        } 
    ?>


<!-- <script>
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            button: "Aww yiss!",
        });

   </script> -->



<script>

        const  todayDateTime = new Date();

        let currentHour = todayDateTime.getHours();
        let currentMin = todayDateTime.getMinutes();

        let todayDate = todayDateTime.toISOString().split("T")[0];

        $("#schedule_modal #schedule_date").attr('min', todayDate);
        // $("#schedule_modal .schedule_time").attr('min', `${currentHour}:${currentMin}`);

</script>
</body>

</html>