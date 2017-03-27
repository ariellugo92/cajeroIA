@extends('tplMaestra')

@section('section-head')
    <title>Retiros | ATM</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('section-prin')
    
    <div  class="section scrollspy container" style="margin-top:50px">
            <div class="container center-align" id="errors"></div>
            <div class="row  main_box card-panel ">
                <!--- Inicio botones de la izquierda -->
             
                <div class="col s2">
                   <div class="row">
                       <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <a id="btn1_izq" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col s12">
                                    <a id="btn2_izq" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                                </div>
                           </div>

                           <div class="row">
                                <div class="col s12">
                                    <a id="btn3_izq" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                               </div>
                          </div>

                           <div class="row">
                                <div class="col s12">
                                    <a id="btn4_izq" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                               </div>
                          </div>
                       </div>
                       
                   </div>

                </div>
                <!--- Fin botones de la izquierda -->

                <!--- Incio centro cajero -->
                <div class="col s8 second_box card-panel">
                    <div class="row">
                        <!--Inicio labels izquierdos de la pantalla -->
                        @include('retiros.plantillas.opcs_izquierda')
                        <!--Fin labels izquierdos de la pantalla -->

                        <!-- Inicio pantalla  -->
                        <div class="col s6 lighten-3 card-panel">
                            <div class="display_atm" id="pnlCentral">

                                <p id="txtMensaje">Ingrese su numero PIN</p>
                                <input id="pantallaPin" type="text" value="0" disabled>
                                <div class="container center-align" id="pnlNumerico">
                                    <div class="row">
                                        <div class="col s4">
                                            <a id="btn_num9" class="waves-effect waves-teal btn-flat">9</a>
                                        </div>
                                        <div class="col s4">
                                            <a id="btn_num8" class="waves-effect waves-teal btn-flat">8</a>
                                        </div>
                                        <div class="col s4">
                                            <a id="btn_num7" class="waves-effect waves-teal btn-flat">7</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s4">
                                            <a id="btn_num6" class="waves-effect waves-teal btn-flat">6</a>
                                        </div>
                                        <div class="col s4">
                                            <a id="btn_num5" class="waves-effect waves-teal btn-flat">5</a>
                                        </div>
                                        <div class="col s4">
                                            <a id="btn_num4" class="waves-effect waves-teal btn-flat">4</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s4">
                                            <a id="btn_num3" class="waves-effect waves-teal btn-flat">3</a>
                                        </div>
                                        <div class="col s4">
                                            <a id="btn_num2" class="waves-effect waves-teal btn-flat">2</a>
                                        </div>
                                        <div class="col s4">
                                            <a id="btn_num1" class="waves-effect waves-teal btn-flat">1</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s4"></div>
                                        <div class="col s4">
                                            <a id="btn_num0" class="waves-effect waves-teal btn-flat">0</a>
                                        </div>
                                        <div class="col s4">
                                            <a id="btn_numErase" class="waves-effect waves-teal btn-flat">
                                                <i class="material-icons">reply</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- /display_atm --}}
                        </div>
                        <!--Fin pantalla -->

                        @include('retiros.plantillas.opcs_derecha')
                        <!--Fin labels derechos de la pantalla -->
                    </div>
                </div>
                <!--- Fin centro cajero -->

                <!--- Inicio botones de la derecha -->
                <div class="col s2">
                    <div class="row">
                       <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <a id="btn1_der" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col s12">
                                    <a id="btn2_der" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                                </div>
                           </div>

                           <div class="row">
                                <div class="col s12">
                                    <a id="btn3_der" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                               </div>
                          </div>

                           <div class="row">
                                <div class="col s12">
                                    <a id="btn4_der" class="btn_extremos  teal lighten-2 center-align waves-effect waves-teal btn"></a>
                               </div>
                          </div>
                       </div>
                   </div>
                </div>

                <!--- Fin botones de la derecha -->
             </div>

        </div>

@endsection

@section('section-scripts')
    {{-- {{ Html::script(asset('js/componentes/panel_numerico.js')) }} --}}
    {{ Html::script(asset('js/componentes/manejo_labels.js')) }}
@endsection