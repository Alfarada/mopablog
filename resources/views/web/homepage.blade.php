@extends('layouts.app')

@section('content')

<!-- Cover image -->
<div class="">
  <img src="{{ asset('image/other.png') }}" class="img-fluid portada" alt="Responsive image">
</div>
<!-- Cover image -->

<div class="container">
  <div class="row">
    <!-- Content -->
    <div class="col-9">
      <!-- Open Card -->
      <div class="card primary">
        <h2 class="mt-4 text-center">Nuestra Historia</h2>
        <hr class="mx-4">
        <div class="row">

          <div class="card-body col-6">
            <p class="px-3">La idea de crear la Asociación civil Motivar para Vivir – MOPAVIV nace como la necesidad de
              cumplir con una Misión de Vida de dos personas Laringectomizadas por causa del Cáncer de Laringe. Ercides
              José Leiba Fuentes y Leidy Josefina Yepez Barreto; quienes se conocieron en una institución denominada
              ASOVELA – Asociación Venezolana de Laringectomizados, ubicada en la ciudad de Caracas, Venezuela, en la
              cual les enseñan a hablar sin cuerdas vocales mediante una técnica terapéutica denominada Erigmofonía.<p>

          </div>
          <div class="col-6 d-flex align-items-center justify-content-center">
            <figure class="figure pr-4">
              <img src="{{ asset('image/grupo.jpg') }}" class="figure-img img-fluid rounded" alt="...">
              <figcaption class="figure-caption">A caption for the above image.</figcaption>
            </figure>
          </div>

        </div>

        <!-- Start - Collapse content -->
        <div class="collapse p-4" id="collapseExample">

          En esta primera etapa se une, Jesús Alejandro Yepez Barreto, hermano de Leidy, es cuando se formaliza la
          inscripción de la Acta constitutiva en el Registro Principal del Estado
          Carabobo – Valencia, el día 10 de Septiembre del año 2014, con la incorporación de dos miembros de la familia
          para conformar nuestra Junta Directiva, Addinson Eduardo Quintero Guillén y Adalberti Francisco Mormino Yepez,
          cuñado e hijo de Leidy, respectivament. <br><br>

          El nombre de la institución se origina luego de una investigación sobre la historia del Cáncer; en los
          primeros años de la era moderna, la lucha contra esta enfermedad se intentaba contrarrestarla mediante la
          cirugía, extirpando el órgano lesionado, pero el Cáncer reaparecía y continuaba segando vidas. Luego de muchos
          años de investigaciones científicas se concluye que la mejor defensa está en atacar a la enfermedad antes de
          su aparición y allí aparece la Prevención. La sociedad Anticancerosa de Venezuela, cada año realiza una
          campaña de prevención del cáncer, con una media de duración de un mes.<br><br>

          En MOPAVIVIVI entendimos que nuestros esfuerzos debían dirigirse en ese sentido y formulamos lo que
          denominamos una Cultura de Prevención del Cáncer, con permanencia constante durante el período anual y
          contacto directo con los receptores de nuestro mensaje motivacional. Es cuando decidimos que nuestra labor
          tenía que destinarse a la Motivación Temprana a personas sanas y Motivación Posterior a personas enfermas.
        </div>
        <p class="pl-3">
          <a id="botonOn" class="btn btn-primary " data-toggle="collapse" href="#collapseExample" role="button"
            aria-expanded="false" aria-controls="collapseExample">
            Más / Menos
          </a>
        </p>
        <!-- Start - Collapse content -->
      </div>
      <!-- Close Card -->
    </div>
    <!-- Content -->

    <!-- Barra lateral -->
    <aside class="col-3 sidebar">
      <div class="card">
        <div class="card-body">
          <h3 class="blod"> Artículos recientes</h3>
          @foreach ($posts as $post)
            <p> <a href="{{ route('post', [$post->id,$post->slug] ) }}"> {{ $post->title }} </a></p>
          @endforeach
        </div>
      </div>
    </aside>
    <!-- Barra lateral -->
  </div>

  <!-- Start Acordion -->
  <div class="row">
    <div class="col-9">
      <div class="accordion" id="accordionExample">
        <div class="card mt-5">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-center " type="button" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h3>¿ Que proponemos ?</h3>
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              Nuestra propuesta como MOPAVIV son las siguientes:
              <ul class="list-group text-left p-3">
                <li class="list-group-item">• Promover y acompañar acciones dirigidas a personas de todas las edades, a
                  los fines de que obtengan un conocimiento sustentable en el tiempo que les permitan formarse una
                  Cultura de Prevención del Cáncer, ejerciendo plenamente su derecho a una mejor calidad de vida.</li>
                <li class="list-group-item">• Realizar gestiones para integrar a la comunidad en general a la tarea de
                  fundar un Centro de Prevención, donde se labore en función de la educación, pesquisa y diagnóstico
                  precoz del Cáncer. </li>
              </ul>

            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-center collapsed" type="button" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h3>¿ Como lo harémos ?</h3>
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <ul class="list-group text-left p-3">
                <li class="list-group-item">• Incentivando la participación de las instituciones Públicas y Privadas
                  para obtener apoyo en la Lucha contra el Cáncer.</li>
                <li class="list-group-item">• Promoviendo acuerdos de cooperación con las autoridades de Salud para
                  colaborar en las Campañas contra el Cáncer. </li>
                <li class="list-group-item">• Divulgando información de manera directa y a través de las redes sociales
                  y medios de comunicación, para fomentar en la comunidad una Cultura de Prevención del Cáncer. </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-center collapsed" type="button" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h3>¿ A quienes van dirigidas nuestras acciones ?</h3>
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <ul class="list-group text-left p-3">
                <li class="list-group-item">• Charlas Motivacionales dirigidas a instituciones educativas, empresas
                  privadas y organismos públicos.</li>
                <li class="list-group-item">• Charlas de Prevención para todo público.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End acordion -->

  <!-- Start content asovela -->

  <div class="row">
    <div class="col-9 my-5">
      <div class="card">
        <div class="card-body">
          <h2 class="text-center"> ASOVELA </h2>
          <hr class="mx-4">
          <p class="mt-3 mb-5 text-center ">ASOVELA – Asociación Venezolana de Laringectomizados es una institución
            ubicada en la ciudad de Caracas,
            fundada por la Sra. María Del Pilar Fernandez de Carro, quien es graduada en Terapia Foniátrica en la
            Universidad de Madrid, ella arriba junto a su familia, en la década de 1950, huyendo de la guerra civil
            española y al poco tiempo comienza a trabajar en el Hospital Vargas, donde crea conjuntamente con el grupo
            médico que allí laboraba, la primera Unidad de Foniatría del país.
            En uno de sus viajes al extranjero en representación de nuestro país aprende una técnica que marcaría su
            vida para siempre, la erigmofonía. Con ella se enseña a hablar a las personas que han perdido el habla por
            causa del Cáncer de Laringe, a esta cirugía se le denomina Laringectomía. Se extrae la Laringe y con ella
            las Cuerdas Vocales. La persona queda muda, sin poder comunicarse verbalmente. Siendo una persona que viene
            sensibilizada con los estragos de la guerra y observando que muchas personas en estas condiciones no poseen
            los recursos económicos para adquirir una válvula fonatoria quedaban incomunicados para siempre; entonces
            comienza a trabajar con la idea de fundar una institución donde puedan acudir los pacientes de bajos
            recursos económicos y de manera gratuita recuperar la voz mediante esta novedosa Técnica de Voz
            Erigmofónica. <br><br>

            <small class="text-muted">(Para mayor información visitar la página de Facebook de ASOVELA)</small>
          </p>
          <div class="embed-responsive rounded-lg embed-responsive-16by9">
            <iframe width="640" height="480" src="https://www.youtube.com/embed/XRudg7MYDro" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-9 mb-5">
      <div class="card">
        <h2 class="card-header text-center text-dark ">¿ Quieres ayudarnos ?</h2>
        <div class="card-body">
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <div><a class="btn btn-primary" href="https://www.paypal.com/paypalme/mopaviv">Donar</a></div>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!--MORE INFORMATION-->
  <div class="row">
    <div class="col-9 mb-5">
      <div class="card">
        <h2 class="card-header text-center text-dark ">Mas Información</h2>
        <div class="card-body">
          <div class="container">
            <div class="row text-center">
              <!--BLOG-->
              <div class="col-sm-12 col-lg-3 m-auto ">
                <div class="h2">
                  <i style="color:#ec407a;" class="fas fa-newspaper"></i>
                </div>
                <a class="h3" style="color:#ec407a;" href="{{ url('/blog') }}">Blog</a>
                <hr>
                <p class="">Visita nuestros ultimos posts</p>
              </div>
              <!--BLOG-->

              <!--CONTACTO-->
              <div class=" col-sm-12 col-lg-3 m-auto ">
                <div class="h2">
                  <i class="fas fa-envelope" style="color:#ec407a;"></i>
                </div>
                <a class="h3" style="color:#ec407a;" href="">Contacto</a>
                <hr>
                <p class="">¿ Necesitas hablar con nosotros ? </p>
              </div>
              <!--CONTACTO-->

              <!--PROYECTOS-->
              <div class=" col-sm-12 col-lg-3 m-auto ">
                <div class="h2">
                  <a href=""><i class="fab fa-telegram-plane" style="color:#ec407a;"></i></a>
                </div>
                <a class="h3" style="color:#ec407a;" href="">Proyectos</a>
                <hr>
                <p class="">Enterate de los ultimos proyectos de la Asociación
                </p>
              </div>
              <!--PROYECTOS-->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection