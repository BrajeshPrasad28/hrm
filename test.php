<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="2"> -->
    <title>Admin_login</title>
    <link rel="shortcut icon" type="images/png" href="images\1200px-Emblem_of_India.svg.png">
    <meta name="viewport" content="width-device-width initial-scale=1">
    <!-- <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="http://creativeitem.com/demo/hrm/assets/js/fullcalendar/fullcalendar.min.js"></script>
    <script src="http://creativeitem.com/demo/hrm/assets/js/neon-calendar.js"></script>
    <script src="moment/moment.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>

                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            Event Schedule                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body" style="float: none;width: 100%;">
                                <div id="notice_calendar" class="fc fc-ltr">
                                  <table class="fc-header" style="width:100%">
                                    <tbody><tr><td class="fc-header-left"><span class="fc-header-title"><h2>February 2019</h2></span></td>
                                      <td class="fc-header-center"></td>
                                      <td class="fc-header-right">
                                        <span class="fc-button fc-button-month fc-state-default fc-corner-left fc-state-active" unselectable="on" style="-moz-user-select: none;">month</span>
                                        <span class="fc-button fc-button-agendaWeek fc-state-default" unselectable="on" style="-moz-user-select: none;">week</span>
                                        <span class="fc-button fc-button-agendaDay fc-state-default fc-corner-right" unselectable="on" style="-moz-user-select: none;">day</span>
                                        <span class="fc-header-space"></span>
                                        <span class="fc-button fc-button-today fc-state-default fc-corner-left fc-corner-right fc-state-disabled" unselectable="on" style="-moz-user-select: none;">today</span>
                                        <span class="fc-header-space"></span>
                                        <span class="fc-button fc-button-prev fc-state-default fc-corner-left" unselectable="on" style="-moz-user-select: none;">
                                          <span class="fc-text-arrow">‹</span></span>
                                          <span class="fc-button fc-button-next fc-state-default fc-corner-right" unselectable="on" style="-moz-user-select: none;">
                                            <span class="fc-text-arrow">›</span></span></td></tr></tbody></table>
                                            <div class="fc-content" style="position: relative;">
                                              <div class="fc-view fc-view-month fc-grid" style="position: relative; -moz-user-select: none;" unselectable="on">
                                                <div class="fc-event-container" style="position:absolute;z-index:8;top:0;left:0"></div>
                                                <table class="fc-border-separate" style="width:100%" cellspacing="0">
                                                  <thead>
                                                    <tr class="fc-first fc-last">
                                                      <th class="fc-day-header fc-mon fc-widget-header fc-first" style="width: 96px;">Mon</th>
                                                      <th class="fc-day-header fc-tue fc-widget-header" style="width: 96px;">Tue</th>
                                                      <th class="fc-day-header fc-wed fc-widget-header" style="width: 96px;">Wed</th>
                                                      <th class="fc-day-header fc-thu fc-widget-header" style="width: 96px;">Thu</th>
                                                      <th class="fc-day-header fc-fri fc-widget-header" style="width: 96px;">Fri</th>
                                                      <th class="fc-day-header fc-sat fc-widget-header" style="width: 96px;">Sat</th>
                                                      <th class="fc-day-header fc-sun fc-widget-header fc-last">Sun</th>
                                                    </tr></thead>
                                                    <tbody>
                                                      <tr class="fc-week fc-first"><td class="fc-day fc-mon fc-widget-content fc-other-month fc-past fc-first" data-date="2019-01-28">
                                                        <div style="min-height: 70px;">
                                                          <div class="fc-day-number">28</div>
                                                          <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                            <td class="fc-day fc-tue fc-widget-content fc-other-month fc-past" data-date="2019-01-29">
                                                              <div>
                                                                <div class="fc-day-number">29</div>
                                                                <div class="fc-day-content">
                                                                  <div style="position: relative; height: 0px;">&nbsp;</div></div></div>
                                                                </td>
                                                                <td class="fc-day fc-wed fc-widget-content fc-other-month fc-past" data-date="2019-01-30">
                                                                  <div>
                                                                    <div class="fc-day-number">30</div>
                                                                    <div class="fc-day-content">
                                                                      <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                      <td class="fc-day fc-thu fc-widget-content fc-other-month fc-past" data-date="2019-01-31">
                                                                        <div>
                                                                          <div class="fc-day-number">31</div>
                                                                          <div class="fc-day-content">
                                                                            <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                            <td class="fc-day fc-fri fc-widget-content fc-past" data-date="2019-02-01">
                                                                              <div>
                                                                                <div class="fc-day-number">1</div>
                                                                                <div class="fc-day-content">
                                                                                  <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                  <td class="fc-day fc-sat fc-widget-content fc-past" data-date="2019-02-02">
                                                                                    <div>
                                                                                      <div class="fc-day-number">2</div>
                                                                                      <div class="fc-day-content">
                                                                                        <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                        <td class="fc-day fc-sun fc-widget-content fc-past fc-last" data-date="2019-02-03">
                                                                                          <div>
                                                                                            <div class="fc-day-number">3</div>
                                                                                            <div class="fc-day-content">
                                                                                              <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td></tr>
                                                                                              <tr class="fc-week">
                                                                                                <td class="fc-day fc-mon fc-widget-content fc-past fc-first" data-date="2019-02-04">
                                                                                                  <div style="min-height: 70px;">
                                                                                                    <div class="fc-day-number">4</div>
                                                                                                    <div class="fc-day-content">
                                                                                                      <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                      <td class="fc-day fc-tue fc-widget-content fc-past" data-date="2019-02-05">
                                                                                                        <div>
                                                                                                          <div class="fc-day-number">5</div>
                                                                                                          <div class="fc-day-content">
                                                                                                            <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                            <td class="fc-day fc-wed fc-widget-content fc-past" data-date="2019-02-06">
                                                                                                              <div>
                                                                                                                <div class="fc-day-number">6</div>
                                                                                                                <div class="fc-day-content">
                                                                                                                  <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                  <td class="fc-day fc-thu fc-widget-content fc-past" data-date="2019-02-07">
                                                                                                                    <div>
                                                                                                                      <div class="fc-day-number">7</div>
                                                                                                                      <div class="fc-day-content">
                                                                                                                        <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                        <td class="fc-day fc-fri fc-widget-content fc-past" data-date="2019-02-08">
                                                                                                                          <div>
                                                                                                                            <div class="fc-day-number">8</div>
                                                                                                                            <div class="fc-day-content">
                                                                                                                              <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                              <td class="fc-day fc-sat fc-widget-content fc-past" data-date="2019-02-09">
                                                                                                                                <div>
                                                                                                                                  <div class="fc-day-number">9</div>
                                                                                                                                  <div class="fc-day-content">
                                                                                                                                    <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                    <td class="fc-day fc-sun fc-widget-content fc-past fc-last" data-date="2019-02-10">
                                                                                                                                      <div>
                                                                                                                                        <div class="fc-day-number">10</div>
                                                                                                                                        <div class="fc-day-content">
                                                                                                                                          <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td></tr>
                                                                                                                                          <tr class="fc-week">
                                                                                                                                            <td class="fc-day fc-mon fc-widget-content fc-past fc-first" data-date="2019-02-11">
                                                                                                                                              <div style="min-height: 70px;">
                                                                                                                                                <div class="fc-day-number">11</div>
                                                                                                                                                <div class="fc-day-content">
                                                                                                                                                  <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                  <td class="fc-day fc-tue fc-widget-content fc-past" data-date="2019-02-12">
                                                                                                                                                    <div>
                                                                                                                                                      <div class="fc-day-number">12</div>
                                                                                                                                                      <div class="fc-day-content">
                                                                                                                                                        <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                        <td class="fc-day fc-wed fc-widget-content fc-past" data-date="2019-02-13">
                                                                                                                                                          <div>
                                                                                                                                                            <div class="fc-day-number">13</div>
                                                                                                                                                            <div class="fc-day-content">
                                                                                                                                                              <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                              <td class="fc-day fc-thu fc-widget-content fc-past" data-date="2019-02-14">
                                                                                                                                                                <div>
                                                                                                                                                                  <div class="fc-day-number">14</div>
                                                                                                                                                                  <div class="fc-day-content">
                                                                                                                                                                    <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                    <td class="fc-day fc-fri fc-widget-content fc-past" data-date="2019-02-15">
                                                                                                                                                                      <div>
                                                                                                                                                                        <div class="fc-day-number">15</div>
                                                                                                                                                                        <div class="fc-day-content"><div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                        <td class="fc-day fc-sat fc-widget-content fc-past" data-date="2019-02-16">
                                                                                                                                                                          <div>
                                                                                                                                                                            <div class="fc-day-number">16</div>
                                                                                                                                                                            <div class="fc-day-content">
                                                                                                                                                                              <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                              <td class="fc-day fc-sun fc-widget-content fc-past fc-last" data-date="2019-02-17">
                                                                                                                                                                                <div>
                                                                                                                                                                                  <div class="fc-day-number">17</div>
                                                                                                                                                                                  <div class="fc-day-content">
                                                                                                                                                                                    <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td></tr>
                                                                                                                                                                                    <tr class="fc-week">
                                                                                                                                                                                      <td class="fc-day fc-mon fc-widget-content fc-past fc-first" data-date="2019-02-18">
                                                                                                                                                                                        <div style="min-height: 70px;">
                                                                                                                                                                                          <div class="fc-day-number">18</div>
                                                                                                                                                                                          <div class="fc-day-content">
                                                                                                                                                                                            <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                            <td class="fc-day fc-tue fc-widget-content fc-past" data-date="2019-02-19">
                                                                                                                                                                                              <div>
                                                                                                                                                                                                <div class="fc-day-number">19</div>
                                                                                                                                                                                                <div class="fc-day-content">
                                                                                                                                                                                                  <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                  <td class="fc-day fc-wed fc-widget-content fc-past" data-date="2019-02-20">
                                                                                                                                                                                                    <div>
                                                                                                                                                                                                      <div class="fc-day-number">20</div>
                                                                                                                                                                                                      <div class="fc-day-content">
                                                                                                                                                                                                        <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                        <td class="fc-day fc-thu fc-widget-content fc-past" data-date="2019-02-21">
                                                                                                                                                                                                          <div>
                                                                                                                                                                                                            <div class="fc-day-number">21</div>
                                                                                                                                                                                                            <div class="fc-day-content">
                                                                                                                                                                                                              <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                              <td class="fc-day fc-fri fc-widget-content fc-past" data-date="2019-02-22">
                                                                                                                                                                                                                <div>
                                                                                                                                                                                                                  <div class="fc-day-number">22</div>
                                                                                                                                                                                                                  <div class="fc-day-content">
                                                                                                                                                                                                                    <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                    <td class="fc-day fc-sat fc-widget-content fc-past" data-date="2019-02-23">
                                                                                                                                                                                                                      <div>
                                                                                                                                                                                                                        <div class="fc-day-number">23</div>
                                                                                                                                                                                                                        <div class="fc-day-content">
                                                                                                                                                                                                                          <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                          <td class="fc-day fc-sun fc-widget-content fc-past fc-last" data-date="2019-02-24">
                                                                                                                                                                                                                            <div>
                                                                                                                                                                                                                              <div class="fc-day-number">24</div>
                                                                                                                                                                                                                              <div class="fc-day-content">
                                                                                                                                                                                                                                <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td></tr>
                                                                                                                                                                                                                                <tr class="fc-week"><td class="fc-day fc-mon fc-widget-content fc-past fc-first" data-date="2019-02-25">
                                                                                                                                                                                                                                  <div style="min-height: 70px;"><div class="fc-day-number">25</div>
                                                                                                                                                                                                                                  <div class="fc-day-content">
                                                                                                                                                                                                                                    <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                    <td class="fc-day fc-tue fc-widget-content fc-today fc-state-highlight" data-date="2019-02-26">
                                                                                                                                                                                                                                      <div>
                                                                                                                                                                                                                                        <div class="fc-day-number">26</div>
                                                                                                                                                                                                                                        <div class="fc-day-content">
                                                                                                                                                                                                                                          <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                          <td class="fc-day fc-wed fc-widget-content fc-future" data-date="2019-02-27">
                                                                                                                                                                                                                                            <div>
                                                                                                                                                                                                                                              <div class="fc-day-number">27</div>
                                                                                                                                                                                                                                              <div class="fc-day-content">
                                                                                                                                                                                                                                                <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                <td class="fc-day fc-thu fc-widget-content fc-future" data-date="2019-02-28">
                                                                                                                                                                                                                                                  <div>
                                                                                                                                                                                                                                                    <div class="fc-day-number">28</div>
                                                                                                                                                                                                                                                    <div class="fc-day-content">
                                                                                                                                                                                                                                                      <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                      <td class="fc-day fc-fri fc-widget-content fc-other-month fc-future" data-date="2019-03-01">
                                                                                                                                                                                                                                                        <div>
                                                                                                                                                                                                                                                          <div class="fc-day-number">1</div>
                                                                                                                                                                                                                                                          <div class="fc-day-content">
                                                                                                                                                                                                                                                            <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                            <td class="fc-day fc-sat fc-widget-content fc-other-month fc-future" data-date="2019-03-02">
                                                                                                                                                                                                                                                              <div>
                                                                                                                                                                                                                                                                <div class="fc-day-number">2</div>
                                                                                                                                                                                                                                                                <div class="fc-day-content">
                                                                                                                                                                                                                                                                  <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                                  <td class="fc-day fc-sun fc-widget-content fc-other-month fc-future fc-last" data-date="2019-03-03">
                                                                                                                                                                                                                                                                    <div>
                                                                                                                                                                                                                                                                      <div class="fc-day-number">3</div>
                                                                                                                                                                                                                                                                      <div class="fc-day-content">
                                                                                                                                                                                                                                                                        <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td></tr>
                                                                                                                                                                                                                                                                        <tr class="fc-week fc-last"><td class="fc-day fc-mon fc-widget-content fc-other-month fc-future fc-first" data-date="2019-03-04">
                                                                                                                                                                                                                                                                          <div style="min-height: 74px;">
                                                                                                                                                                                                                                                                            <div class="fc-day-number">4</div>
                                                                                                                                                                                                                                                                            <div class="fc-day-content">
                                                                                                                                                                                                                                                                              <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                                              <td class="fc-day fc-tue fc-widget-content fc-other-month fc-future" data-date="2019-03-05">
                                                                                                                                                                                                                                                                                <div>
                                                                                                                                                                                                                                                                                  <div class="fc-day-number">5</div>
                                                                                                                                                                                                                                                                                  <div class="fc-day-content">
                                                                                                                                                                                                                                                                                    <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                                                    <td class="fc-day fc-wed fc-widget-content fc-other-month fc-future" data-date="2019-03-06">
                                                                                                                                                                                                                                                                                      <div>
                                                                                                                                                                                                                                                                                        <div class="fc-day-number">6</div>
                                                                                                                                                                                                                                                                                        <div class="fc-day-content">
                                                                                                                                                                                                                                                                                          <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                                                          <td class="fc-day fc-thu fc-widget-content fc-other-month fc-future" data-date="2019-03-07">
                                                                                                                                                                                                                                                                                            <div>
                                                                                                                                                                                                                                                                                              <div class="fc-day-number">7</div>
                                                                                                                                                                                                                                                                                              <div class="fc-day-content">
                                                                                                                                                                                                                                                                                                <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                                                                <td class="fc-day fc-fri fc-widget-content fc-other-month fc-future" data-date="2019-03-08">
                                                                                                                                                                                                                                                                                                  <div>
                                                                                                                                                                                                                                                                                                    <div class="fc-day-number">8</div>
                                                                                                                                                                                                                                                                                                    <div class="fc-day-content">
                                                                                                                                                                                                                                                                                                      <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                                                                      <td class="fc-day fc-sat fc-widget-content fc-other-month fc-future" data-date="2019-03-09">
                                                                                                                                                                                                                                                                                                        <div>
                                                                                                                                                                                                                                                                                                          <div class="fc-day-number">9</div>
                                                                                                                                                                                                                                                                                                          <div class="fc-day-content">
                                                                                                                                                                                                                                                                                                            <div style="position: relative; height: 0px;">&nbsp;</div></div></div></td>
                                                                                                                                                                                                                                                                                                            <td class="fc-day fc-sun fc-widget-content fc-other-month fc-future fc-last" data-date="2019-03-10">
                                                                                                                                                                                                                                                                                                              <div>
                                                                                                                                                                                                                                                                                                                <div class="fc-day-number">10</div>
                                                                                                                                                                                                                                                                                                                <div class="fc-day-content"><div style="position: relative; height: 0px;">&nbsp;</div></div></div></td></tr></tbody></table></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>

  </body>
</html>
