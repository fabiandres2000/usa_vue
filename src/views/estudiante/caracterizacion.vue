<template>
    <v-container fluid class="down-top-padding">
      <section id='loading'>Guardando Datos....</section>
      <v-row>
        <v-col cols="12" lg="12">
          <v-card>
            <v-card-text class="text-left p-5">
              <h1 style="color: #2c4a73; font-weight: bold">Caracterización  Sociodemográfica</h1>
              <hr>
              <form @submit.prevent="guardar_socio" method="post" ref="form_registro_socio" id="form_registro_socio">
                <div class="row">
                    <div class="col-lg-12">
                        <label>Nombres y Apellidos</label>
                        <input v-model="estudiante.nombre" placeholder="Nombres y Apellidos" type="text"  class="form-control" id="nombre" required name="nombre">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="padding-top: 15px;">
                        <label for="">Semestre Cursado</label>
                        <select v-model="estudiante.semestre" style="height: 38px;" name="semestre" id="semestre" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="I">I Semestre</option>
                            <option value="II">II Semestre</option>
                            <option value="III">III Semestre</option>
                            <option value="IV">IV Semestre</option>
                            <option value="V">V Semestre</option>
                            <option value="VI">VI Semestre</option>
                            <option value="VII">VII Semestre</option>
                            <option value="VIII">VIII Semestre</option>
                            <option value="IX">IX Semestre</option>
                            <option value="X">X Semestre</option>
                        </select>
                    </div>
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <label for="">Tipo de Identificación</label>
                        <select v-model="socio.tipo_id" style="height: 38px;" name="tipo_id" id="tipo_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="TI">TI</option>
                            <option value="CC">CC</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <label for=""># identificación</label>
                        <input v-model="estudiante.cedula" placeholder="# identificación" type="number"  class="form-control" id="id" required name="id">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3" style="padding-top: 15px;">
                    <label for="">Edad</label>
                        <input v-model="socio.edad" placeholder="Edad" type="number"  class="form-control" id="edad" required name="edad">
                    </div>
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <label for="">Sexo</label>
                        <select v-model="socio.sexo" style="height: 38px;" name="sexo" id="sexo" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Masulino">Masulino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <label for="">Estrato socioeconómico</label>
                        <select v-model="socio.estrato" style="height: 38px;" name="estrato" id="estrato" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Estrato 1">Estrato 1</option>
                            <option value="Estrato 2">Estrato 2</option>
                            <option value="Estrato 3">Estrato 3</option>
                            <option value="Estrato 4">Estrato 4</option>
                            <option value="Estrato 5">Estrato 5</option>
                            <option value="Estrato 6">Estrato 6</option>
                        </select>
                    </div>
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <Label># de Celular</Label>
                        <input v-model="estudiante.celular" placeholder="# de celular" type="number"  class="form-control" id="celular" required name="celular">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Ciudad donde reside generalmente</label>
                        <input v-model="socio.ciudad" placeholder="Ciudad donde reside generalmente" type="text"  class="form-control" id="ciudad" required name="ciudad">
                    </div>
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <label for="">Cantidad de Hijos</label>
                        <select v-model="socio.cantidad_hijos" style="height: 38px;" name="cantidad_hijos" id="cantidad_hijos" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="0">0</option>    
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>   
                        </select>
                    </div>
                    <div class="col-lg-5" style="padding-top: 15px;">
                        <label for="">Economicamente depende de</label>
                        <select v-model="socio.dependencia" style="height: 38px;" name="dependencia" id="dependencia" class="form-control" required>
                            <option value="">Seleccione.....</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Hermano(a)">Hermano(a)</option>
                            <option value="Familiares">Familiares</option>
                            <option value="Pareja">Pareja</option>
                            <option value="De nadie">De nadie</option> 
                            <option value="Soy independiente">Soy independiente</option>  
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <label for="">Consume algún tipo de sustancia psicoactiva</label>
                        <select v-model="socio.sustancias" style="height: 38px;" name="sustancias" id="sustancias" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>   
                        </select>
                    </div>
                    <div class="col-lg-5" style="padding-top: 15px;">
                        <label for="">Indique la frecuencia con la que consume sustancias psicoativas</label>
                        <select v-model="socio.frecuencia" style="height: 38px;" name="frecuencia" id="frecuencia" class="form-control" required>
                            <option value="">Seleccione.....</option>
                            <option value="No consumo">No consumo</option>
                            <option value="Una vez al día">Una vez al día</option>
                            <option value="Varias veces al día">Varias veces al día</option>
                            <option value="Una vez a la semana">Una vez a la semana</option>
                            <option value="Varias veces a la semana">Varias veces a la semana</option>
                            <option value="Una vez al mes">Una vez al mes</option> 
                            <option value="Varias veces al mes">Varias veces al mes</option>  
                            <option value="Mensualmente ">Mensualmente </option>
                        </select>
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Ha recibido tratamiento para el control de la adición</label>
                        <select v-model="socio.tratamiento"  style="height: 38px;" name="tratamiento" id="tratamiento" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>   
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="padding-top: 15px;">
                        <label for="">Indique la cantidad de horas que labora semanalmente</label>
                        <select v-model="socio.cantidad_labora" style="height: 38px;" name="cantidad_labora" id="cantidad_labora" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="No laboro ">No laboro </option>
                            <option value="1 a 8">1 a 8</option>  
                            <option value="16 a 24">16 a 24</option> 
                            <option value="25 a 48">25 a 4</option>
                            <option value="Más de 48">Más de 48</option>
                        </select>
                    </div>
                    <div class="col-lg-6" style="padding-top: 15px;">
                        <label for="">Su universidad se encuentra en la ciudad de</label>
                        <select v-model="socio.ciudad_uni" style="height: 38px;" name="ciudad_uni" id="ciudad_uni" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Barranquilla">Barranquilla</option>
                            <option value="Santa Marta">Santa Marta</option>   
                            <option value="Bogotá">Bogotá</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-top: 15px;">
                        <label for="">Señale la(s) persona(s) con quien vive en la ciudad donde estudia</label>
                    </div>
                </div>
                <div class="row" v-if="!tiene">
                    <div class="col-lg-1">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Padre">
                        <label id="check" for="personas_estudia">Padre</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Madre">
                        <label id="check" for="personas_estudia">Madre</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Hermano(s)">
                        <label id="check" for="personas_estudia">Hermano(s)</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Familiares">
                        <label id="check" for="personas_estudia">Familiares</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Pareja">
                        <label id="check" for="personas_estudia">Pareja</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Solo">
                        <label id="check" for="personas_estudia">Solo</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Pensionado">
                        <label id="check" for="personas_estudia">Pensionado</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="personas_estudia" name="personas_estudia" value="Otros">
                        <label id="check" for="personas_estudia">Otros</label>
                    </div>
                </div>
                <div class="row" v-if="tiene">
                    <div class="col-lg-12">
                        <h5>{{socio.personas_estudia}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="padding-top: 15px;">
                        <label for="">Realiza usted alguna actividad física</label>
                        <select v-model="socio.actividad_fisica" style="height: 38px;" name="actividad_fisica" id="actividad_fisica" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Diariamente">Diariamente </option>
                            <option value="Semanalmente">Semanalmente</option>  
                            <option value="Mensualmente">Mensualmente</option>
                            <option value="No">No</option>    
                        </select>
                    </div>
                    <div class="col-lg-6" style="padding-top: 15px;">
                        <label for="">Intensidad de la actividad física (aproximadamente)</label>
                        <select v-model="socio.intensidad_fisica" style="height: 38px;" name="intensidad_fisica" id="intensidad_fisica" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Ninguna">Ninguna</option>
                            <option value="Hasta media hora">Hasta media hora</option>  
                            <option value="Hasta una hora">Hasta una hora</option>
                            <option value="Hasta hora y media">Hasta hora y media</option>   
                            <option value="Hasta dos horas">Hasta dos horas</option>
                            <option value="Más de dos horas">Más de dos horas</option>  
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-top: 15px;">
                        <label for="">Señale las actvidades que más practica en su tiempo libre</label>
                    </div>
                </div>
                <div class="row" v-if="!tiene">
                    <div class="col-lg-1">
                        <input type="checkbox" id="actividades" name="actividades" value="Cine">
                        <label id="check" for="actividades">Cine</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="actividades" name="actividades" value="Ver TV">
                        <label id="check" for="actividades">Ver TV</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="actividades" name="actividades" value="Leer">
                        <label id="check" for="actividades">Leer</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="actividades" name="actividades" value="Pasear">
                        <label id="check" for="actividades">Pasear</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="actividades" name="actividades" value="Practicar deporte">
                        <label id="check" for="actividades">Practicar deporte</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="actividades" name="actividades" value="Salir con amigos">
                        <label id="check" for="actividades">Salir con amigos</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" id="actividades" name="actividades" value="Dormir">
                        <label id="check" for="actividades">Dormir</label>
                    </div>
                    <div class="col-lg-3">
                        <input type="checkbox" id="actividades" name="actividades" value="Compartir en familiar">
                        <label id="check" for="actividades">Compartir en familiar</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="actividades" name="actividades" value="Redes sociales">
                        <label id="check" for="actividades">Redes sociales</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="actividades" name="actividades" value="Salir con mi pareja">
                        <label id="check" for="actividades">Salir con mi pareja</label>
                    </div>
                </div>
                <div class="row" v-if="tiene">
                    <div class="col-lg-12">
                        <h5>{{socio.actividades}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="padding-top: 15px;">
                        <label for="">En época de clases, generalmente, cuántas horas duerme diariamente</label>
                        <select v-model="socio.horas" style="height: 38px;" name="horas" id="horas" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="1">1 </option>
                            <option value="2">2</option>  
                            <option value="3">3</option>
                            <option value="4">4</option>    
                            <option value="5">5 </option>
                            <option value="6">6</option>  
                            <option value="7">7</option>
                            <option value="8">8</option>  
                            <option value="9">9 </option>
                            <option value="10">10</option>  
                            <option value="11">11</option>
                            <option value="12">12</option>  
                        </select>
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Ha sido diagnosticado con algún tipo de enfermedad?</label>
                        <select v-model="socio.enfermedad" style="height: 38px;" name="enfermedad" id="enfermedad" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>   
                        </select>
                    </div>
                    <div class="col-lg-3" style="padding-top: 15px;">
                        <input v-model="socio.cual_enfermedad" type="text" style="position: absolute;bottom: 12px;" class="form-control" placeholder="cual?" id="cual_enfermedad" name="cual_enfermedad">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-top: 15px;">
                        <label for="">23.	Señale las comidas que consume con mayor frecuencia</label>
                    </div>
                </div>
                <div class="row" v-if="!tiene">
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Sopa">
                        <label id="check" for="comidas">Sopa</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Arroz">
                        <label id="check" for="comidas">Arroz</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Pollo">
                        <label id="check" for="comidas">Pollo</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Pescado">
                        <label id="check" for="comidas">Pescado</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Pizza">
                        <label id="check" for="comidas">Pizza</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Pastas">
                        <label id="check" for="comidas">Pastas</label>
                    </div>
                </div>
                <div class="row" v-if="!tiene">
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Verduras">
                        <label id="check" for="comidas">Verduras</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Frutas">
                        <label id="check" for="comidas">Frutas</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Lacteos">
                        <label id="check" for="comidas">Lacteos</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Yuca">
                        <label id="check" for="comidas">Yuca </label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Ñame">
                        <label id="check" for="comidas">Ñame</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Platano">
                        <label id="check" for="comidas">Platano</label>
                    </div>
                </div>
                <div class="row" v-if="!tiene">
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Papa">
                        <label id="check" for="comidas">Papa</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Granos">
                        <label id="check" for="comidas">Granos</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Pan">
                        <label id="check" for="comidas">Pan</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Tortillas">
                        <label id="check" for="comidas">Tortillas</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Frituras">
                        <label id="check" for="comidas">Frituras</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="checkbox" id="comidas" name="comidas" value="Carne (res o cerdo)">
                        <label id="check" for="comidas">Carne (res o cerdo)</label>
                    </div>
                </div>
                <div class="row" v-if="!tiene">
                    <div class="col-lg-12">
                        <input type="checkbox" id="comidas" name="comidas" value="Comidas rápidas">
                        <label id="check" for="comidas">Comidas rápidas</label>
                    </div>
                </div>
                <div class="row" v-if="tiene">
                    <div class="col-lg-12">
                        <h5>{{socio.comidas}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">ICFES (puntaje)</label>
                        <input  v-model="socio.icfes" placeholder="ICFES (puntaje)" type="text"  class="form-control" id="icfes" required name="icfes">
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Promedio académico</label>
                        <input  v-model="socio.promedio" placeholder="Promedio Academico" type="text"  class="form-control" id="promedio" required name="promedio">
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Fecha</label>
                        <select  v-model="socio.periodo" style="height: 38px;" name="periodo" id="periodo" class="form-control">
                                <option value="">Fecha</option>
                                <option value="2022-1">2022-1</option>
                                <option value="2022-2">2022-2</option>
                                <option value="2023-1">2023-1</option>
                                <option value="2023-2">2023-2</option>
                                <option value="2024-1">2024-1</option>
                                <option value="2024-2">2024-2</option>
                                <option value="2025-1">2025-1</option>
                                <option value="2025-2">2025-2</option>
                                <option value="2026-1">2026-1</option>
                                <option value="2026-2">2026-2</option>
                                <option value="2027-1">2027-1</option>
                                <option value="2027-2">2027-2</option>
                                <option value="2028-1">2028-1</option>
                                <option value="2028-2">2028-2</option>
                                <option value="2029-1">2029-1</option>
                                <option value="2029-2">2029-2</option>
                                <option value="2021-1">2030-1</option>
                                <option value="2021-2">2030-2</option>
                            </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Información de la Madre</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Edad</label>
                        <input  v-model="socio.edad_madre" placeholder="Edad" type="number"  class="form-control" id="edad_madre" required name="edad_madre">
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Nivel de educación</label>
                        <select  v-model="socio.estudios_madre" style="height: 38px;" name="estudios_madre" id="estudios_madre" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="No es bachiller">No es bachiller </option>
                            <option value="Bachiller">Bachiller</option>  
                            <option value="Estudios superiores">Estudios superiores</option>
                        </select>
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Dedicación</label>
                        <select  v-model="socio.dedicacion_madre" style="height: 38px;" name="dedicacion_madre" id="dedicacion_madre" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Ama de casa">Ama de casa </option>
                            <option value="Independiente">Independiente</option>  
                            <option value="Empleada">Empleada</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Información del Padre</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Edad</label>
                        <input  v-model="socio.edad_padre" placeholder="Edad" type="number"  class="form-control" id="edad_padre" required name="edad_padre">
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Nivel de educación</label>
                        <select  v-model="socio.estudios_padre" style="height: 38px;" name="estudios_padre" id="estudios_padre" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="No es bachiller">No es bachiller </option>
                            <option value="Bachiller">Bachiller</option>  
                            <option value="Estudios superiores">Estudios superiores</option>
                        </select>
                    </div>
                    <div class="col-lg-4" style="padding-top: 15px;">
                        <label for="">Dedicación</label>
                        <select  v-model="socio.dedicacion_padre" style="height: 38px;" name="dedicacion_padre" id="dedicacion_padre" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Ama de casa">Ama de casa  </option>
                            <option value="Independiente">Independiente</option>  
                            <option value="Empleado">Empleado</option>
                        </select>
                        <input type="hidden" class="form-control" v-model="estudiante.id" id="id_estudiante" name="id_estudiante">
                    </div>
                </div>
                <br>
                <div class="row" v-if="!tiene">
                    <div class="col-lg-6">
                        <button style="width: 100%" type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a style="width: 100%; color: white"  class="btn btn-danger">Cancelar</a>
                    </div>
                </div>            
            </form> 
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script>

  import * as estudianteService from "../../servicios/estudiante_service"
  //import * as practicasService from "../../servicios/practicas"
  //import store from "../../store";
  import $ from "jquery";
  
  export default {
    name: "Caracterizacion",
    data: () => ({  
      id_estudiante: "",
      estudiante: {},
      socio: {},
      tiene: false
    }),
    components: {},
    mounted() {
      this.id_estudiante = this.$session.get("id_estudiante");
      const load = document.querySelector("#loading");
      load.style.display = "none";
      this.consultar_estudiante();
      this.consultar_socio();
    },
    methods: {
      async consultar_estudiante(){
        await estudianteService.consultar_estudiante(this.id_estudiante).then(respuesta => {
          this.estudiante = respuesta.data.estudiante;
        });
      },
      async guardar_socio() {
        const load = document.querySelector("#loading");
        load.style.display = "grid";

        const formData = new FormData(this.$refs['form_registro_socio']); 
        const data = {};
        for (let [key, val] of formData.entries()) {
          Object.assign(data, { [key]: val })
        }
        
        var personas_estudia_array = '';   
        var item = 0; 
        $(':checkbox[name=personas_estudia]').each(function(){
            if (this.checked) {
                if(item == 0){
                    personas_estudia_array += $(this).val();
                }else{
                    personas_estudia_array += '-'+$(this).val();
                }
                item++;
            }
        }); 
        Object.assign(data, {'personas_estudia_array': personas_estudia_array })
        
        var actividades_array = '';   
        item = 0; 
        $(':checkbox[name=actividades]').each(function(){
            if (this.checked) {
                if(item == 0){
                    actividades_array += $(this).val();
                }else{
                    actividades_array += '-'+$(this).val();
                }
                item++;
            }
        }); 
        Object.assign(data, {'actividades_array': actividades_array })

        var comidas_array = '';   
        item = 0; 
        $(':checkbox[name=comidas]').each(function(){
            if (this.checked) {
                if(item == 0){
                    comidas_array += $(this).val();
                }else{
                    comidas_array += '-'+$(this).val();
                }
                item++;
            }
        }); 
        Object.assign(data, {'comidas_array': comidas_array })

        await estudianteService.guardar_socio(data).then(respuesta => {
          if(respuesta.data.codigo == 1){
            this.$swal('Correcto...', respuesta.data.respuesta, 'success');
            const load = document.querySelector("#loading");
            load.style.display = "none";
          }else{
            this.$swal('Error...', respuesta.data.respuesta, 'error');
            const load = document.querySelector("#loading");
            load.style.display = "none";
          }
        });
      },
      async consultar_socio(){
        await estudianteService.consultar_socio(this.id_estudiante).then(respuesta => {
          this.socio = respuesta.data.socio;
          if(this.socio != null){
            this.tiene = true;
          }
        });
      },
    },
  };
</script>
<style>
    label{
        color: #2c4a73;
        font-weight: bold;
    }
</style>
  