@extends('layouts.master')
@section('title', 'Pertanyaan')
@section('content')
  <aside>
    <a href="" class="active"><img src="{{ asset('img/logo/skin.png') }}" class="mr-2" height="150"><span>skin</span></a>
    <a href=""><img src="{{ asset('img/logo/lifestyle.png') }}" class="mr-2" height="150"><span>lifestyle</span></a>
    <a href=""><img src="{{ asset('img/logo/environment.png') }}" class="mr-2" height="150"><span>environment</span></a>
  </aside>
  <main>
    <div class="container" style="height: 100%;">
      <div id="pageInsive" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <h1>1. What is your current age?</h1>
            <ul>
              <li>
                <input type="radio" name="question_first" id="qfirst_a_option" checked>
                <label for="qfirst_a_option">Under 18</label>
              </li>
              <li>
                <input type="radio" name="question_first" id="qfirst_b_option">
                <label for="qfirst_b_option">19-29</label>
              </li>
              <li>
                <input type="radio" name="question_first" id="qfirst_c_option">
                <label for="qfirst_c_option">30-39</label>
              </li>
              <li>
                <input type="radio" name="question_first" id="qfirst_d_option">
                <label for="qfirst_d_option">40-49</label>
              </li>
              <li>
                <input type="radio" name="question_first" id="qfirst_e_option">
                <label for="qfirst_e_option">50-59</label>
              </li>
              <li>
                <input type="radio" name="question_first" id="qfirst_f_option">
                <label for="qfirst_f_option">60+</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>2. What is your gender?</h1>
            <ul>
              <li>
                <input type="radio" name="question_second" id="qsecond_a_option">
                <label for="qsecond_a_option">Female</label>
              </li>
              <li>
                <input type="radio" name="question_second" id="qsecond_b_option">
                <label for="qsecond_b_option">Male</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>3. Describe your skin from forehead to chin (multiple choice)</h1>
            <ul>
              <li>
                <input type="checkbox" name="question_third" id="qthird_a_option">
                <label for="qthird_a_option"><i class='bx bx-check'></i> Dry or rough</label>
              </li>
              <li>
                <input type="checkbox" name="question_third" id="qthird_b_option">
                <label for="qthird_b_option"><i class='bx bx-check'></i> Oily all over</label>
              </li>
              <li>
                <input type="checkbox" name="question_third" id="qthird_c_option">
                <label for="qthird_c_option"><i class='bx bx-check'></i> Excess oil on t-zone</label>
              </li>
              <li>
                <input type="checkbox" name="question_third" id="qthird_d_option">
                <label for="qthird_d_option"><i class='bx bx-check'></i> Uneven tone</label>
              </li>
              <li>
                <input type="checkbox" name="question_third" id="qthird_e_option">
                <label for="qthird_e_option"><i class='bx bx-check'></i> Lines and creases</label>
              </li>
              <li>
                <input type="checkbox" name="question_third" id="qthird_f_option">
                <label for="qthird_f_option"><i class='bx bx-check'></i> All is well</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>4. How often do you breakout (multiple choice)</h1>
            <ul>
              <li>
                <input type="checkbox" name="question_fourth" id="qfourth_a_option">
                <label for="qfourth_a_option"><i class='bx bx-check'></i> Rarely see a spot</label>
              </li>
              <li>
                <input type="checkbox" name="question_fourth" id="qfourth_b_option">
                <label for="qfourth_b_option"><i class='bx bx-check'></i> Few times a month</label>
              </li>
              <li>
                <input type="checkbox" name="question_fourth" id="qfourth_c_option">
                <label for="qfourth_c_option"><i class='bx bx-check'></i> Seems forever</label>
              </li>
              <li>
                <input type="checkbox" name="question_fourth" id="qfourth_d_option">
                <label for="qfourth_d_option"><i class='bx bx-check'></i> All clear here</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>5. Any of these skin sensitivities sound familiar? (multiple choice)</h1>
            <ul>
              <li>
                <input type="checkbox" name="question_fifth" id="qfifth_a_option">
                <label for="qfifth_a_option"><i class='bx bx-check'></i> Irritated</label>
              </li>
              <li>
                <input type="checkbox" name="question_fifth" id="qfifth_b_option">
                <label for="qfifth_b_option"><i class='bx bx-check'></i> Itchy</label>
              </li>
              <li>
                <input type="checkbox" name="question_fifth" id="qfifth_c_option">
                <label for="qfifth_c_option"><i class='bx bx-check'></i> Dry</label>
              </li>
              <li>
                <input type="checkbox" name="question_fifth" id="qfifth_d_option">
                <label for="qfifth_d_option"><i class='bx bx-check'></i> Red</label>
              </li>
              <li>
                <input type="checkbox" name="question_fifth" id="qfifth_e_option">
                <label for="qfifth_e_option"><i class='bx bx-check'></i> Blotchy</label>
              </li>
              <li>
                <input type="checkbox" name="question_fifth" id="qfifth_f_option">
                <label for="qfifth_f_option"><i class='bx bx-check'></i> None</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>6. What’s involved in your daily skincare routine? (multiple choice)</h1>
            <ul>
              <li>
                <input type="checkbox" name="question_sixth" id="qsixth_a_option">
                <label for="qsixth_a_option"><i class='bx bx-check'></i> Cleansers</label>
              </li>
              <li>
                <input type="checkbox" name="question_sixth" id="qsixth_b_option">
                <label for="qsixth_b_option"><i class='bx bx-check'></i> Toners</label>
              </li>
              <li>
                <input type="checkbox" name="question_sixth" id="qsixth_c_option">
                <label for="qsixth_c_option"><i class='bx bx-check'></i> Serum</label>
              </li>
              <li>
                <input type="checkbox" name="question_sixth" id="qsixth_d_option">
                <label for="qsixth_d_option"><i class='bx bx-check'></i> Moisturizers</label>
              </li>
              <li>
                <input type="checkbox" name="question_sixth" id="qsixth_e_option">
                <label for="qsixth_e_option"><i class='bx bx-check'></i> Eye creams</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>7. What about makeup? (multiple choice)</h1>
            <ul>
              <li>
                <input type="checkbox" name="question_seventh" id="qseventh_a_option">
                <label for="qseventh_a_option"><i class='bx bx-check'></i> Primer or concealer</label>
              </li>
              <li>
                <input type="checkbox" name="question_seventh" id="qseventh_b_option">
                <label for="qseventh_b_option"><i class='bx bx-check'></i> Foundation cream or powder</label>
              </li>
              <li>
                <input type="checkbox" name="question_seventh" id="qseventh_c_option">
                <label for="qseventh_c_option"><i class='bx bx-check'></i> BB cream</label>
              </li>
              <li>
                <input type="checkbox" name="question_seventh" id="qseventh_d_option">
                <label for="qseventh_d_option"><i class='bx bx-check'></i> Lipstick or mascara</label>
              </li>
              <li>
                <input type="checkbox" name="question_seventh" id="qseventh_e_option">
                <label for="qseventh_e_option"><i class='bx bx-check'></i> Contours or highlighters</label>
              </li>
              <li>
                <input type="checkbox" name="question_seventh" id="qseventh_f_option">
                <label for="qseventh_f_option"><i class='bx bx-check'></i> All natural</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>8. How much do you use?</h1>
            <ul>
              <li>
                <input type="radio" name="question_eighth" id="qeighth_a_option">
                <label for="qeighth_a_option">I prefer natural skin</label>
              </li>
              <li>
                <input type="radio" name="question_eighth" id="qeighth_b_option">
                <label for="qeighth_b_option">Light coverage</label>
              </li>
              <li>
                <input type="radio" id="qeighth_c_option" name="question_eighth">
                <label for="qeighth_c_option">Not too light, not too heavy</label>
              </li>
              <li>
                <input type="radio" name="question_eighth" id="qeighth_d_option">
                <label for="qeighth_d_option">Bold and layered</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1>9. What would you say is your main skin goal? </h1>
            <ul>
              <li>
                <input type="radio" name="question_ninth" id="qninth_a_option">
                <label for="qninth_a_option">Keep clear</label>
              </li>
              <li>
                <input type="radio" name="question_ninth" id="qninth_b_option">
                <label for="qninth_b_option">Even tone</label>
              </li>
              <li>
                <input type="radio" name="question_ninth" id="qninth_c_option">
                <label for="qninth_c_option">Blur fine lines</label>
              </li>
              <li>
                <input type="radio" name="question_ninth" id="qninth_d_option">
                <label for="qninth_d_option">Boost hydration</label>
              </li>
              <li>
                <input type="radio" name="question_ninth" id="qninth_e_option">
                <label for="qninth_e_option">Be less oily</label>
              </li>
              <li>
                <input type="radio" name="question_ninth" id="qninth_f_option">
                <label for="qninth_f_option">Maintain current status</label>
              </li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="carousel-item">
            <h1></h1>
            <ul>
              <li></li>
              <li></li>
            </ul>
          </div>
        </div>
        <a class="carousel-control-prev" href="#pageInsive" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true">
            <i class='bx bx-left-arrow-alt' ></i>
          </span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#pageInsive" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true">
            <i class='bx bx-right-arrow-alt'></i>
          </span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </main>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $(".carousel").carousel({
        interval: false
      });

      $(".carousel-control-prev").hide();
      $(".carousel-control-next").click(function(){
        $(".carousel-control-prev").show();
      });
      $("#pageInsive").on('slid.bs.carousel', function(){
        var $this = $('#pageInsive');
        if ($('.carousel-inner .carousel-item:first').hasClass('active')) {
            // Hide left arrow
            $this.children('.carousel-control-prev').hide();
            // But show right arrow
            $this.children('.carousel-control-next').show();
        }
        else if ($('.carousel-inner .carousel-item:last').hasClass('active')) {
          // Hide right arrow
          $this.children('.carousel-control-next').hide();
          // But show left arrow
          $this.children('.carousel-control-prev').show();
        }
      });
    });
  </script>
@endsection
