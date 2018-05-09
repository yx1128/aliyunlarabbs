<footer class="footer">
      <div class="container">
        <div class="row footer-top">

          <div class="col-sm-5 col-lg-5">

              <p class="padding-top-xsm">我们是检测诊断社区，致力于为工程师提供一个分享创造、结识伙伴、协同互助的平台。</p>


          </div>

          <div class="col-sm-6 col-lg-6 col-lg-offset-1">

            <div class="row">
                <div class="col-sm-4">
                </div>

                  <div class="col-sm-4">
                    <h4>{{ lang('Site Status') }}</h4>
                    <ul class="list-unstyled">
                        <li>{{ lang('Total User') }}: {{ $siteStat->user_count }} </li>
                        <li>{{ lang('Total Topic') }}: {{ $siteStat->topic_count }} </li>
                        <li>{{ lang('Total Reply') }}: {{ $siteStat->reply_count }} </li>
                    </ul>
                  </div>
                  <div class="col-sm-4">
                    <h4>其他信息</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('machines.index') }}"><i class="fa fa-globe text-md"></i> 本站设备</a></li>
                        <li><a href="/about"><i class="fa fa-info-circle" aria-hidden="true"></i> 关于本站</a></li>
                        <li><a href="{{ route('hall_of_fames') }}"><i class="fa fa-star" aria-hidden="true"></i> {{ lang('Hall of Fame') }}</a></li>
                    </ul>
                  </div>

                </div>

          </div>
        </div>
        <br>
        <br>
      </div>
    </footer>
