<!-- UI JS Link's -->
<script src="<?=admin_asset_url("ui/bootstrap/js/bootstrap.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/jscrollpane/script/jquery.jscrollpane.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/sweetalert/dist/sweetalert.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/ladda/dist/ladda.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/select2/js/select2.full.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/spin.js/spin.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/jquery-mousewheel/jquery.mousewheel.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/chartist/dist/chartist.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/chart.js/src/Chart.bundle.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/moment/min/moment.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/fullcalendar/dist/fullcalendar.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/nprogress/nprogress.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/jquery-steps/build/jquery.steps.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/select2/dist/js/select2.full.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/bootstrap-select/dist/js/bootstrap-select.min.js")?>"></script>
<script src="<?=admin_asset_url("theme/ui/dropify/dist/js/dropify.min.js")?>"></script>

<script src="<?=admin_asset_url("js/master.js")?>"></script>

<!-- Theme Fixed Script's -->
<script src="<?=admin_asset_url("theme/js/common.js")?>"></script>
<script src="<?=admin_asset_url("theme/js/demo.temp.js")?>"></script>
<script>
    $(document).ready(function () {
        ///////////////////////////////////////////////////////////
        // CUSTOM SCROLL
        if (!cleanUI.hasTouch) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                    throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        };

		<?php if($module == 'index'){?>

        ///////////////////////////////////////////////////////////
        // CALENDAR
        $('.example-calendar-block').fullCalendar({
            //aspectRatio: 2,
            height: 450,
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            buttonIcons: {
                prev: 'none fa fa-arrow-left',
                next: 'none fa fa-arrow-right',
                prevYear: 'none fa fa-arrow-left',
                nextYear: 'none fa fa-arrow-right'
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            viewRender: function(view, element) {
                if (!cleanUI.hasTouch) {
                    $('.fc-scroller').jScrollPane({
                        autoReinitialise: true,
                        autoReinitialiseDelay: 100
                    });
                }
            },
            defaultDate: '2016-05-12',
            events: [
                {
                    title: 'Kampanya',
                    start: '2016-05-01',
                    end: '2016-05-06',
                    className: 'fc-event-success'
                },
                {
                    id: 999,
                    title: 'Hatırlatma',
                    start: '2016-05-09',
                    className: 'fc-event-warning'
                },
                {
                    id: 999,
                    title: 'Hatırlatma',
                    start: '2016-05-16',
                    className: 'fc-event-warning'
                },
                {
                    title: 'Otomatik mail',
                    start: '2016-05-11',
                    end: '2016-05-14',
                    className: 'fc-event-danger'
                }
            ],
            eventClick: function(calEvent, jsEvent, view) {
                if (!$(this).hasClass('event-clicked')) {
                    $('.fc-event').removeClass('event-clicked');
                    $(this).addClass('event-clicked');
                }
            }
        });

        ///////////////////////////////////////////////////////////
        // CAROUSEL WIDGET
        $('.carousel-widget').carousel({
            interval: 4000
        });

        $('.carousel-widget-2').carousel({
            interval: 6000
        });

        ///////////////////////////////////////////////////////////
        // CHART 1
        new Chartist.Line(".chart-line", {
                labels: ["Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma","Cumartesi","Pazar"],
                series: [
                    [10, 150, 140, 200, 220,150,195],
                    [50, 170, 95, 156, 250,200,350]
                ]
            },
            {
                fullWidth: !0,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.tooltip()
                ]
            });

		<?php }; ?>
    });
</script>
</div>
</div>

</section>
</body>
</html>