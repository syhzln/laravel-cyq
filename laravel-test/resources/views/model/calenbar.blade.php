<!doctype html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
       <title></title>
       <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
       <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
       <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/daterangepicker-bs3.css')}}" />
       <script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
   </head>
   <body>
            {{--<h4>MyCalenbar</h4>--}}
               <div id="reportrange2" class="btn" style="display: inline-block; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                  <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                  <span>定位到上一个未登录日</span> <b class="caret"></b>
               </div>
               <script type="text/javascript">
               $(document).ready(function() {
                  $('#reportrange2 span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                  $('#reportrange2').daterangepicker();
               });
               </script>
            </div>
         </div>

   </body>
</html>
