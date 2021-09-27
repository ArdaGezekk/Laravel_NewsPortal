@extends('main.home_master')
@section('content')
  @php
  $firstSectionBig = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
  $firstSection = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();
  @endphp
  <!-- 1st-news-section-start -->
  <section class="news-section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          <div class="row">
            <div class="col-md-1 col-sm-1 col-lg-1"></div>
            <div class="col-md-10 col-sm-10">
              <div class="lead-news">
                <div class="service-img"><a href="{{ URL::to('view/post/'.$firstSectionBig->id) }}"><img src="{{ $firstSectionBig->image }}" width="800px" alt="Notebook"></a></div>
                <div class="content">
                  <h4 class="lead-heading-01"><a href="#">
                    @if(session()->get('lang')== 'english')
                      {{ Str::limit($firstSectionBig->title_en,255) }}
                    @else
                      {{ Str::limit($firstSectionBig->title_tr,255) }}
                    @endif
                  </a> </h4>
                </div>
              </div>
            </div>
          </div>
          @foreach($firstSection as $row)
            <div class="col-md-3 col-sm-3">
              <div class="top-news">
                <a href="{{ URL::to('view/post/'.$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                <h4 class="heading-02"><a href="{{ URL::to('view/post/'.$row->id) }}">
                  @if(session()->get('lang')== 'english')
                    {{ Str::limit($row->title_en,75) }}
                  @else
                    {{ Str::limit($row->title_tr,75) }}
                  @endif</a> </h4>
                </div>
              </div>
            @endforeach
            <!-- add-start -->
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="add"><img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
              </div>
            </div><!-- /.add-close -->
            <!-- news-start -->
            <div class="row">
              @php
              $firstcategory = DB::table('categories')->first();
              $firstcatpostbig = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',1)->first();
              $firstcatpostsmall = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
              @endphp
              <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                  <div class="cetagory-title"><a href="#">
                    @if(session()->get('lang')== 'english')
                      {{Str::limit($firstcategory->category_en,100)}}
                    @else
                      {{Str::limit($firstcategory->category_tr,100)}}
                    @endif
                    <span>
                      @if(session()->get('lang')== 'english')
                        More
                      @else
                        Daha Fazlası
                      @endif
                      <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <div class="top-news">
                            <a href="#"><img src="{{ $firstcatpostbig->image }}" alt="Notebook"></a>
                            <h4 class="heading-02"><a href="#">
                              @if(session()->get('lang')== 'english')
                                {{Str::limit($firstcatpostbig->title_en,75)}}
                              @else
                                {{Str::limit($firstcatpostbig->title_tr,75)}}
                              @endif
                            </a> </h4>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                          @foreach ($firstcatpostsmall as $row)
                            <div class="image-title">
                              <a href="#"><img src="{{ asset($row->image) }}" alt="{{$row->title_en}}"></a>
                              <h4 class="heading-03"><a href="#">
                                @if(session()->get('lang')== 'english')
                                  {{Str::limit($row->title_en,75)}}
                                @else
                                  {{Str::limit($row->title_tr,75)}}
                                @endif
                              </a> </h4>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  @php
                  $secondcategory = DB::table('categories')->skip(1)->first();
                  $secondcatpostbig = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',1)->first();
                  $secondcatpostsmall = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
                  @endphp
                  <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                      <div class="cetagory-title"><a href="#">
                        @if(session()->get('lang')== 'english')
                          {{Str::limit($secondcategory->category_en,100)}}
                        @else
                          {{Str::limit($secondcategory->category_tr,100)}}
                        @endif
                        <span>
                          @if(session()->get('lang')== 'english')
                            More
                          @else
                            Daha Fazlası
                          @endif <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6">
                              <div class="top-news">
                                <a href="#"><img src="{{ asset($secondcatpostbig->image) }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">
                                  @if(session()->get('lang')== 'english')
                                    {{Str::limit($secondcatpostbig->title_en,75)}}
                                  @else
                                    {{Str::limit($secondcatpostbig->title_tr,75)}}
                                  @endif
                                </a> </h4>
                              </div>
                            </div>
                            @foreach ($secondcatpostsmall as $row)
                              <div class="col-md-6 col-sm-6">
                                <div class="image-title">
                                  <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                  <h4 class="heading-03"><a href="#">
                                    @if(session()->get('lang')== 'english')
                                      {{Str::limit($row->title_en,75)}}
                                    @else
                                      {{Str::limit($row->title_tr,75)}}
                                    @endif
                                  </a> </h4>
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <!-- add-start -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
                      </div>
                    </div><!-- /.add-close -->
                    @php
                    $livetv = DB::table('livetvs')->first();
                    @endphp
                    <!-- youtube-live-start -->
                    @if ($livetv->status == 1)
                      <div class="cetagory-title-03">Live TV</div>
                      <div class="photo">
                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                          {!! $livetv->embed_code !!}
                        </div>
                      </div><!-- /.youtube-live-close -->
                    @endif
                    <!-- facebook-page-start -->
                    <div class="cetagory-title-03">Facebook </div>
                    <div class="fb-root">
                      facebook page here
                    </div><!-- /.facebook-page-close -->
                    <!-- add-start -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                          <img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" />
                        </div>
                      </div>
                    </div><!-- /.add-close -->
                  </div>
                </div>
              </div>
            </section><!-- /.1st-news-section-close -->
            <!-- 2nd-news-section-start -->
            @php
            $thirdcategory = DB::table('categories')->skip(2)->first();
            $thirdcatpostbig = DB::table('posts')->where('category_id',$thirdcategory->id)->where('bigthumbnail',1)->first();
            $thirdcatpostsmall = DB::table('posts')->where('category_id',$thirdcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
            @endphp
            <section class="news-section">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                      <div class="cetagory-title-02"><a href="#">
                        @if(session()->get('lang')== 'english')
                          {{Str::limit($thirdcategory->category_en,100)}}
                        @else
                          {{Str::limit($thirdcategory->category_tr,100)}}
                        @endif
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
                          @if(session()->get('lang')== 'english')
                            All News
                          @else
                            Hepsini Görüntüle
                          @endif
                        </span></a></div>
                        <div class="row">
                          <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                              <a href="#"><img src="{{ asset($thirdcatpostbig->image) }}" alt="Notebook"></a>
                              <h4 class="heading-02"><a href="#">
                                @if(session()->get('lang')== 'english')
                                  {{Str::limit($thirdcatpostbig->title_en,75)}}
                                @else
                                  {{Str::limit($thirdcatpostbig->title_tr,75)}}
                                @endif
                              </a> </h4>
                            </div>
                          </div>
                          @foreach ($thirdcatpostsmall as $row)
                            <div class="col-md-6 col-sm-6">
                              <div class="image-title">
                                <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">
                                  @if(session()->get('lang')== 'english')
                                    {{Str::limit($row->title_en,75)}}
                                  @else
                                    {{Str::limit($row->title_tr,75)}}
                                  @endif
                                </a> </h4>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    @php
                    $fourhcategory = DB::table('categories')->skip(3)->first();
                    $fourhcatpostbig = DB::table('posts')->where('category_id',$fourhcategory->id)->where('bigthumbnail',1)->first();
                    $fourhcatpostsmall = DB::table('posts')->where('category_id',$fourhcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
                    @endphp
                    <div class="col-md-6 col-sm-6">
                      <div class="bg-one">
                        <div class="cetagory-title-02"><a href="#">
                          @if(session()->get('lang')== 'english')
                            {{Str::limit($fourhcategory->category_en,100)}}
                          @else
                            {{Str::limit($fourhcategory->category_tr,100)}}
                          @endif
                          <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
                            @if(session()->get('lang')== 'english')
                              All News
                            @else
                              Hepsini Görüntüle
                            @endif
                          </span></a></div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6">
                              <div class="top-news">
                                <a href="#"><img src="{{ asset($fourhcatpostbig->image) }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">
                                  @if(session()->get('lang')== 'english')
                                    {{Str::limit($fourhcatpostbig->title_en,75)}}
                                  @else
                                    {{Str::limit($fourhcatpostbig->title_tr,75)}}
                                  @endif
                                </a> </h4>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              @foreach ($fourhcatpostsmall as $row)
                                <div class="image-title">
                                  <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                  <h4 class="heading-03"><a href="#">
                                    @if(session()->get('lang')== 'english')
                                      {{Str::limit($row->title_en,75)}}
                                    @else
                                      {{Str::limit($row->title_tr,75)}}
                                    @endif
                                  </a> </h4>
                                </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- ******* -->
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                          <div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6">
                              <div class="top-news">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                              </div>
                              <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                              </div>
                              <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                          <div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6">
                              <div class="top-news">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                              </div>
                              <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                              </div>
                              <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- add-start -->
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="add"><img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="add"><img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
                      </div>
                    </div><!-- /.add-close -->
                  </div>
                </section><!-- /.2nd-news-section-close -->
                <!-- 3rd-news-section-start -->
                <section class="news-section">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-9 col-sm-9">
                        <div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                        <div class="row">
                          <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                              <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                              <h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <div class="image-title">
                              <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                              <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                            </div>
                            <div class="image-title">
                              <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                              <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                            </div>
                            <div class="image-title">
                              <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                              <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <div class="image-title">
                              <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                              <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                            </div>
                            <div class="image-title">
                              <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                              <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                            </div>
                            <div class="image-title">
                              <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                              <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                            </div>
                          </div>
                        </div>
                        <!-- ******* -->
                        <br />
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                            <div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <div class="bg-gray">
                              <div class="top-news">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <div class="news-title">
                              <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                              <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                              <a href="#">Facebook Messenger gets shiny new logo</a>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <div class="news-title">
                              <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                              <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                              <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add">
                              <img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" />
                            </div>
                          </div>
                        </div><!-- /.add-close -->
                      </div>

                      @php
                        $latest = DB::table('posts')->orderBy('id','desc')->limit(5)->get();
                        $favourite = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(4)->get();
                        $heighest = DB::table('posts')->orderBy('id','asc')->inRandomOrder()->limit(4)->get();
                      @endphp
                      <div class="col-md-3 col-sm-3">
                        <div class="tab-header">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                              @if(session()->get('lang')== 'english')
                                Latest
                              @else
                                En Son
                              @endif
                            </a></li>
                            <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                              @if(session()->get('lang')== 'english')
                                Popular
                              @else
                                Popüler
                              @endif
                            </a></li>
                            <li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                              @if(session()->get('lang')== 'english')
                                Highest
                              @else
                                En Yüksek
                              @endif
                            </a></li>
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane in active" id="tab21">
                              <div class="news-titletab">
                                @foreach ($latest as $row)
                                <div class="news-title-02">
                                  <h4 class="heading-03"><a href="#">
                                    @if(session()->get('lang')== 'english')
                                      {{Str::limit($row->title_en,150)}}
                                    @else
                                      {{Str::limit($row->title_tr,150)}}
                                    @endif
                                  </a> </h4>
                                </div>
                              @endforeach
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab22">
                              <div class="news-titletab">
                                @foreach ($favourite as $row)

                                @endforeach
                                <div class="news-title-02">
                                  <h4 class="heading-03"><a href="#">
                                    @if(session()->get('lang')== 'english')
                                      {{Str::limit($row->title_en,150)}}
                                    @else
                                      {{Str::limit($row->title_tr,150)}}
                                    @endif
                                  </a> </h4>
                                </div>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab23">
                              <div class="news-titletab">
                                @foreach ($heighest as $row)

                                <div class="news-title-02">
                                  <h4 class="heading-03"><a href="#">
                                    @if(session()->get('lang')== 'english')
                                      {{Str::limit($row->title_en,150)}}
                                    @else
                                      {{Str::limit($row->title_tr,150)}}
                                    @endif
                                  </a> </h4>
                                </div>
                              @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                        @php
                        $prayer = DB::table('prayers')->first();
                        @endphp
                        <!-- Namaj Times -->
                        <div class="cetagory-title-03">
                          @if(session()->get('lang')=='english')
                            Prayer Time
                          @else
                            Namaz Vakti
                          @endif
                        </div>
                        <table class="table">
                          <thead>
                            @if(session()->get('lang')=='english')
                              <tr>
                                <th>Fajr</th>
                                <th>Sunrise</th>
                                <th>Dhuhr</th>
                                <th>Asr</th>
                                <th>Maghrib</th>
                                <th>Isha</th>
                              </tr>
                            @else
                              <tr>
                                <th>İmsak</th>
                                <th>Güneş</th>
                                <th>Öğle</th>
                                <th>İkindi</th>
                                <th>Akşam	</th>
                                <th>Yatsı</th>
                              </tr>
                            @endif
                          </thead>
                          <tbody>
                            <tr>
                              <td>05:13</td>
                              <td>06:34</td>
                              <td>12:48</td>
                              <td>16:10</td>
                              <td>18:48</td>
                              <td>20:03</td>
                            </tr>
                          </tbody>
                        </table>
                        Prayer Times count option here
                        <!-- Namaj Times -->
                        <div class="cetagory-title-03">Old News  </div>
                        <form action="" method="post">
                          <div class="old-news-date">
                            <input type="text" name="from" placeholder="From Date" required="">
                            <input type="text" name="" placeholder="To Date">
                          </div>
                          <div class="old-date-button">
                            <input type="submit" value="search ">
                          </div>
                        </form>
                        <!-- news -->
                        <br><br><br><br><br>
                        <div class="cetagory-title-04">
                          @if(session()->get('lang')== 'english')
                            Important Website
                          @else
                            Önemli Websiteler
                          @endif </div>
                          <div class="">
                            @php
                            $websitelink = DB::table('websites')->orderBy('id','desc')->get();
                            @endphp
                            @foreach($websitelink as $row)
                              <div class="news-title-02">
                                <h4 class="heading-03"><a href="{{ $row->website_link }}"><i class="fa fa-check" aria-hidden="true"></i>{{ $row->website_name }}  </a> </h4>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </section><!-- /.3rd-news-section-close -->
                    <!-- gallery-section-start -->
                    <section class="news-section">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-8 col-sm-7">
                            <div class="gallery_cetagory-title">
                              @if(session()->get('lang')== 'english')
                                Photo Gallery
                              @else
                                Fotoğraf Galerisi
                              @endif
                            </div>
                            @php
                            $photobig = DB::table('photos')->where('type',1)->orderBy('id','desc')->first();
                            $photosmall = DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(5)->get();
                            @endphp
                            <div class="row">
                              <div class="col-md-8 col-sm-8">
                                <div class="photo_screen">
                                  <div class="myPhotos" style="width:100%" >
                                    <img src="{{ asset($photobig->photo )}}" alt="{{$photobig->title}}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-4">
                                <div class="photo_list_bg">
                                  @foreach($photosmall as $row)
                                    <div class="photo_img photo_border active">
                                      <img src="{{ asset($row->photo)}}" alt="image" onclick="currentDiv(1)">
                                      <div class="heading-03">
                                        {{ $row->title }}
                                      </div>
                                    </div>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                            <!--=======================================
                            Video Gallery clickable jquary  start
                            ========================================-->
                            <script>
                            var slideIndex = 1;
                            showDivs(slideIndex);
                            function plusDivs(n) {
                              showDivs(slideIndex += n);
                            }
                            function currentDiv(n) {
                              showDivs(slideIndex = n);
                            }
                            function showDivs(n) {
                              var i;
                              var x = document.getElementsByClassName("myPhotos");
                              var dots = document.getElementsByClassName("demo");
                              if (n > x.length) {slideIndex = 1}
                              if (n < 1) {slideIndex = x.length}
                              for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                              }
                              for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                              }
                              x[slideIndex-1].style.display = "block";
                              dots[slideIndex-1].className += " w3-opacity-off";
                            }
                            </script>
                            <!--=======================================
                            Video Gallery clickable  jquary  close
                            =========================================-->
                          </div>
                          <div class="col-md-4 col-sm-5">
                            <div class="gallery_cetagory-title">
                              @if(session()->get('lang')== 'english')
                                Video Gallery
                              @else
                                Video Galerisi
                              @endif
                            </div>
                            @php
                            $videobig = DB::table('videos')->where('type',1)->orderBy('id','desc')->first();
                            $videosamll = DB::table('videos')->where('type',0)->orderBy('id','desc')->limit(4)->get();
                            @endphp
                            <div class="row">
                              <div class="col-md-12 col-sm-12">
                                <div class="video_screen">
                                  <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                      <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $videobig->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="gallery_sec owl-carousel">
                                  @foreach($videosamll as $row)
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                      <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $row->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                            <script>
                            var slideIndex = 1;
                            showDivss(slideIndex);
                            function plusDivs(n) {
                              showDivss(slideIndex += n);
                            }
                            function currentDivs(n) {
                              showDivss(slideIndex = n);
                            }
                            function showDivss(n) {
                              var i;
                              var x = document.getElementsByClassName("myVideos");
                              var dots = document.getElementsByClassName("demo");
                              if (n > x.length) {slideIndex = 1}
                              if (n < 1) {slideIndex = x.length}
                              for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                              }
                              for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                              }
                              x[slideIndex-1].style.display = "block";
                              dots[slideIndex-1].className += " w3-opacity-off";
                            }
                            </script>
                          </div>
                        </div>
                      </div>
                    </section><!-- /.gallery-section-close -->
                  @endsection
