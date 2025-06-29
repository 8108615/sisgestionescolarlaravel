<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Ppff;
use App\Models\Turno;
use App\Models\User;
use App\Models\Matriculacion;
use App\Models\Asignacion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);


        User::create([
            'name' => 'Erick Fernando Morales Gil',
            'email' => 'erick@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('ADMINISTRADOR');
        Configuracion::create([
            'nombre' => 'Universidad Erick',
            'descripcion' => 'Universidad para Todo',
            'direccion' => 'Av Cumavi/Barrio San juan Calle 5/Nro223',
            'telefono' => '76658536',
            'divisa' => 'Bs',
            'correo_electronico' => 'erickfer@gmail.com',
            'web' => 'https://erick.com',
            'logo' => 'uploads/logos/1747287829_escolar.png',
        ]);

        Gestion::create(['nombre' => '2023']);
        Gestion::create(['nombre' => '2024']);
        Gestion::create(['nombre' => '2025']);

        Periodo::create(['nombre' => '1er TRIMESTRE', 'gestion_id' => '1']);
        Periodo::create(['nombre' => '2do TRIMESTRE', 'gestion_id' => '1']);
        Periodo::create(['nombre' => '3er TRIMESTRE', 'gestion_id' => '1']);
        Periodo::create(['nombre' => '1er TRIMESTRE', 'gestion_id' => '2']);
        Periodo::create(['nombre' => '2do TRIMESTRE', 'gestion_id' => '2']);
        Periodo::create(['nombre' => '3er TRIMESTRE', 'gestion_id' => '2']);
        Periodo::create(['nombre' => '1er TRIMESTRE', 'gestion_id' => '3']);
        Periodo::create(['nombre' => '2do TRIMESTRE', 'gestion_id' => '3']);
        Periodo::create(['nombre' => '3er TRIMESTRE', 'gestion_id' => '3']);

        Nivel::create(['nombre' => 'INICIAL']);
        Nivel::create(['nombre' => 'PRIMARIA']);
        Nivel::create(['nombre' => 'SECUNDARIA']);

        Grado::create(['nombre' => '1ro INICIAL','nivel_id' => 1]);
        Grado::create(['nombre' => '2do INICIAL','nivel_id' => 1]);
        Grado::create(['nombre' => '1ro PRIMARIA','nivel_id' => 2]);
        Grado::create(['nombre' => '2do PRIMARIA','nivel_id' => 2]);
        Grado::create(['nombre' => '3ro PRIMARIA','nivel_id' => 2]);
        Grado::create(['nombre' => '4to PRIMARIA','nivel_id' => 2]);
        Grado::create(['nombre' => '5to PRIMARIA','nivel_id' => 2]);
        Grado::create(['nombre' => '6to PRIMARIA','nivel_id' => 2]);
        Grado::create(['nombre' => '1ro SECUNDARIA','nivel_id' => 3]);
        Grado::create(['nombre' => '2do SECUNDARIA','nivel_id' => 3]);
        Grado::create(['nombre' => '3ro SECUNDARIA','nivel_id' => 3]);
        Grado::create(['nombre' => '4to SECUNDARIA','nivel_id' => 3]);
        Grado::create(['nombre' => '5to SECUNDARIA','nivel_id' => 3]);
        Grado::create(['nombre' => '6to SECUNDARIA','nivel_id' => 3]);

        Paralelo::create(['nombre' => 'A', 'grado_id' => '1']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '2']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '3']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '4']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '5']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '6']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '7']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '8']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '9']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '10']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '11']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '12']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '13']);
        Paralelo::create(['nombre' => 'A', 'grado_id' => '14']);

        Turno::create(['nombre' => 'Mañana']);
        Turno::create(['nombre' => 'Tarde']);
        Turno::create(['nombre' => 'Noche']);

        Materia::create(['nombre' => 'ARTE PLASTICA Y VISUAL']);
        Materia::create(['nombre' => 'BIOLOGIA - GEOGRAFIA']);
        Materia::create(['nombre' => 'CIENCIAS SOCIALES']);
        Materia::create(['nombre' => 'COMPUTACION']);
        Materia::create(['nombre' => 'COSMOVISIONES, FILOSOFIA Y PSICOLOGIA']);
        Materia::create(['nombre' => 'EDUCACION FISICA Y DEPORTES']);
        Materia::create(['nombre' => 'EDUCACION MUSICAL']);
        Materia::create(['nombre' => 'FISICA']);
        Materia::create(['nombre' => 'LENGUAJE CASTELLANA Y ORIGIRIA']);
        Materia::create(['nombre' => 'LENGUAJE EXTRANJERA']);
        Materia::create(['nombre' => 'MATEMATICA']);
        Materia::create(['nombre' => 'QUIMICA']);
        Materia::create(['nombre' => 'VALORES, ESPIRITUALIDADES Y RELIGIONES']);
        Materia::create(['nombre' => 'TECNICA TECNOLOGIA GENERAL']);

        //Administrativo 1
        //Administrativo 1
        user::create(['name' => 'Juan Mendoza', 'email' => 'juan.mendoza@gmail.com', 'password' => Hash::make('87654321')])->assignRole('DIRECTOR/A GENERAL');
        Personal::create([
            'usuario_id' => 2,
            'tipo' => 'administrativo',
            'nombres' => 'Juan',
            'apellidos' => 'Mendoza',
            'ci' => '87654321',
            'fecha_nacimiento' => '1985-05-15',
            'direccion' => 'Calle Falsa 123',
            'telefono' => '78584512',
            'profesion' => 'Lic. en Matematicas',
            'foto' => 'uploads/fotos/juan.jpg',
        ]);
        //Administrativo 2
        user::create(['name' => 'Carlos Rojas', 'email' => 'carlos.rojas@gmail.com', 'password' => Hash::make('76543210')])->assignRole('DIRECTOR/A ACADÉMICO');
        Personal::create([
            'usuario_id' => 3,
            'tipo' => 'Administrativo',
            'nombres' => 'Carlos',
            'apellidos' => 'Rojas',
            'ci' => '76543210',
            'fecha_nacimiento' => '1978-11-22',
            'direccion' => 'Calle Junin 456',
            'telefono' => '65432109',
            'profesion' => 'Contador Publico',
            'foto' => 'uploads/fotos/'.time().'carlos.jpg',
        ]);
        //Administrativo 3
        user::create(['name' => 'Ana Torres', 'email' => 'ana.torres@gmail.com', 'password' => Hash::make('65432109')])->assignRole('DIRECTOR/A ADMINISTRATIVO');
        Personal::create([
            'usuario_id' => 4,
            'tipo' => 'Administrativo',
            'nombres' => 'Ana',
            'apellidos' => 'Torres',
            'ci' => '65432109',
            'fecha_nacimiento' => '1985-05-15',
            'direccion' => 'Calle Bolivar 123',
            'telefono' => '78584512',
            'profesion' => 'Lic. en Administracion',
            'foto' => 'uploads/fotos/'.time().'ana.jpg',
        ]);
        //Administrativo 4
        user::create(['name' => 'Maria Lopez', 'email' => 'maria.lopes@gmail.com', 'password' => Hash::make('54321098')])->assignRole('SECRETARIO/A');
        Personal::create([
            'usuario_id' => 5,
            'tipo' => 'Administrativo',
            'nombres' => 'Maria',
            'apellidos' => 'Lopez',
            'ci' => '54321098',
            'fecha_nacimiento' => '1990-03-10',
            'direccion' => 'Calle Sucre 789',
            'telefono' => '12345678',
            'profesion' => 'Lic. en Derecho',
            'foto' => 'uploads/fotos/'.time().'maria.jpg',
        ]);
        //administrativo 5
        user::create(['name' => 'Pedro Gutierrez', 'email' => 'pedro.gutierrez@gmail.com', 'password' => Hash::make('43210987')])->assignRole('CAJERO/A');
        Personal::create([
            'usuario_id' => 6,
            'tipo' => 'Administrativo',
            'nombres' => 'Pedro',
            'apellidos' => 'Gutierrez',
            'ci' => '43210987',
            'fecha_nacimiento' => '1988-07-20',
            'direccion' => 'Calle Ayacucho 321',
            'telefono' => '98765432',
            'profesion' => 'Lic. en Contabilidad',
            'foto' => 'uploads/fotos/'.time().'pedro.jpg',
        ]);

        //Administrativo 6
        user::create(['name' => 'Laura Fernandez', 'email' => 'laura.fernandez@gmail.com', 'password' => Hash::make('32109876')])->assignRole('REGENTE');
        Personal::create([
            'usuario_id' => 7,
            'tipo' => 'Administrativo',
            'nombres' => 'Laura',
            'apellidos' => 'Fernandez',
            'ci' => '32109876',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'laura.jpg',
            'created_at' => now()->subYears(3), //fecha de ingreso hace 3 años
        ]);

        //Docente 1
        user::create(['name' => 'Maria Fernandez', 'email' => 'maria.fernandez@gmail.com', 'password' => Hash::make('9876543')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 8,
            'tipo' => 'docente',
            'nombres' => 'Maria',
            'apellidos' => 'Fernandez',
            'ci' => '9876543',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_maria.jpg',
        ]);
        //Docente 2
        user::create(['name' => 'Carlos Rios', 'email' => 'carlos.rios@gmail.com', 'password' => Hash::make('6543210')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 9,
            'tipo' => 'docente',
            'nombres' => 'Carlos',
            'apellidos' => 'Rios',
            'ci' => '6543210',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Calle Falsa 123',
            'telefono' => '12345678',
            'profesion' => 'Lic. en Educacion',
            'foto' => 'uploads/fotos/'.time().'_carlos.jpg'
        ]);
        //Docente 3
        user::create(['name' => 'Ana Morales', 'email' => 'ana.morales@gmail.com', 'password' => Hash::make('3210987')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 10,
            'tipo' => 'docente',
            'nombres' => 'Ana',
            'apellidos' => 'Morales',
            'ci' => '3210987',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_ana.jpg'
        ]);

        //Docente 4
        user::create(['name' => 'Jorge Pacheco', 'email' => 'jorge.pacheco@gmail.com', 'password' => Hash::make('7890123')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 11,
            'tipo' => 'docente',
            'nombres' => 'Jorge',
            'apellidos' => 'Pacheco',
            'ci' => '7890123',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Calle Falsa 123',
            'telefono' => '12345678',
            'profesion' => 'Lic. en Educacion',
            'foto' => 'uploads/fotos/'.time().'_jorge.jpg'
        ]);
        //Docente 5
        user::create(['name' => 'Lucia Mendoza', 'email' => 'lucia.mendoza@gmail.com', 'password' => Hash::make('4567890')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 12,
            'tipo' => 'docente',
            'nombres' => 'Lucia',
            'apellidos' => 'Mendoza',
            'ci' => '4567890',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_lucia.jpg'
        ]);

        //Docente 6
        user::create(['name' => 'Roberto Sanchez', 'email' => 'roberto.sanchez@gmail.com', 'password' => Hash::make('23456789')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 13,
            'tipo' => 'docente',
            'nombres' => 'Roberto',
            'apellidos' => 'Sanchez',
            'ci' => '23456789',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_roberto.jpg'
        ]);
        //Docente 7
        user::create(['name' => 'Sofia Rojas ', 'email' => 'sofia.rojas@gmail.com', 'password' => Hash::make('8901234')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 14,
            'tipo' => 'docente',
            'nombres' => 'Sofia',
            'apellidos' => 'Rojas',
            'ci' => '8901234',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_sofia.jpg'
        ]);

        //Docente 8
        user::create(['name' => 'Mario olmo', 'email' => 'mario.olmo@gmail.com', 'password' => Hash::make('12131415')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 15,
            'tipo' => 'docente',
            'nombres' => 'Mario',
            'apellidos' => 'Olmo',
            'ci' => '12131415',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_mario.jpg'
        ]);

        //Docente 9
        user::create(['name' => 'Maurio Añez', 'email' => 'mauricio.añez@gmail.com', 'password' => Hash::make('16171819')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 16,
            'tipo' => 'docente',
            'nombres' => 'Maurio',
            'apellidos' => 'Añez',
            'ci' => '16171819',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_mauricio.jpg'
        ]);

        //Docente 10
        user::create(['name' => 'Maria Leny', 'email' => 'maria.leny@gmail.com', 'password' => Hash::make('13141516')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 17,
            'tipo' => 'docente',
            'nombres' => 'Maria',
            'apellidos' => 'Leny',
            'ci' => '13141516',
            'fecha_nacimiento' => '1995-08-30',
            'direccion' => 'Calle Libertad 456',
            'telefono' => '65432198',
            'profesion' => 'Lic. en Psicologia',
            'foto' => 'uploads/fotos/'.time().'_marialeny.jpg'
        ]);

        Ppff::create(['nombres' => 'Luis Fernando','apellidos'=>'Gomez Perez','ci'=>'11112222','fecha_nacimiento'=> '1981-06-18','telefono'=> '70112233','parentesco'=>'Padre','ocupacion'=>'Ingeniero de Sistemas','direccion'=>'Av cumavi']);
        Ppff::create(['nombres' => 'Maria Luisa','apellidos'=>'Alba Rios','ci'=>'22223333','fecha_nacimiento'=> '1982-03-22','telefono'=> '70223344','parentesco'=>'Madre','ocupacion'=>'Ama de Casa','direccion'=>'Av eucalipto']);
        Ppff::create(['nombres' => 'Roberto Carlos','apellidos'=>'Mendez Flores','ci'=>'33334444','fecha_nacimiento'=> '1979-03-15','telefono'=> '70334455','parentesco'=>'Hermana','ocupacion'=>'Estudiante','direccion'=>'Av la Salle']);
        Ppff::create(['nombres' => 'Ana Patricia','apellidos'=>'Diaz Castro','ci'=>'44445555','fecha_nacimiento'=> '1982-11-30','telefono'=> '70445566','parentesco'=>'Madre','ocupacion'=>'Secretaria','direccion'=>'Villa 1ero de Mayo']);
        Ppff::create(['nombres' => 'Gabriela','apellidos'=>'Torrez Mendoza','ci'=>'55556666','fecha_nacimiento'=> '1986-07-20','telefono'=> '70556677','parentesco'=>'Madre','ocupacion'=>'Secretaria','direccion'=>'Doble Via la Guardia']);
        Ppff::create(['nombres' => 'Carolina','apellidos'=>'Romero Salazar','ci'=>'66667777','fecha_nacimiento'=> '1988-08-21','telefono'=> '70667788','parentesco'=>'Hermana','ocupacion'=>'Estudiante','direccion'=>'Av Banzer']);
        Ppff::create(['nombres' => 'Mario','apellidos'=>'Suarez Velasco','ci'=>'77778888','fecha_nacimiento'=> '1985-08-22','telefono'=> '70778899','parentesco'=>'Padre','ocupacion'=>'Tutor','direccion'=>'Plan 3000']);
        Ppff::create(['nombres' => 'Nicolas','apellidos'=>'Roman Peres','ci'=>'88889999','fecha_nacimiento'=> '1986-09-23','telefono'=> '70778991','parentesco'=>'Padre','ocupacion'=>'Tutor','direccion'=>'Plan 4000']);
        Ppff::create(['nombres' => 'Aida','apellidos'=>'Baldivieso Rojas','ci'=>'55551111','fecha_nacimiento'=> '1988-04-24','telefono'=> '70799911','parentesco'=>'Madre','ocupacion'=>'Productora','direccion'=>'Plan 3000 6to Anillo']);
        Ppff::create(['nombres' => 'Roxana','apellidos'=>'Caro Saldias','ci'=>'55552222','fecha_nacimiento'=> '1987-05-29','telefono'=> '70799912','parentesco'=>'Madre','ocupacion'=>'Diseñadora','direccion'=>'Av. los Lotes']);
        


        User::create(['name' => 'Gabriel Rodriguez Silva','email' => 'gabriel@gmail.com','password' => Hash::make('33445566')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 18,'ppff_id' => 1, 'nombres' =>'Gabriel','apellidos'=>'Rodriguez Silva','ci'=>'33445566','fecha_nacimiento' => '2007-03-12','telefono'=>'75566445','direccion'=>'Av cumavi','foto'=>'_gabriel.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Lucia Vargas Torres','email' => 'lucia@gmail.com','password' => Hash::make('44556677')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 19,'ppff_id' => 2, 'nombres' =>'Lucia','apellidos'=>'Vargas Torres','ci'=>'44556677','fecha_nacimiento' => '2007-04-13','telefono'=>'75566446','direccion'=>'Av eucalipto','foto'=>'_lucia.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Matteo Castro Roca','email' => 'matteo@gmail.com','password' => Hash::make('55667788')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 20,'ppff_id' => 3, 'nombres' =>'Matteo','apellidos'=>'Castro Roca','ci'=>'55667788','fecha_nacimiento' => '2007-05-14','telefono'=>'75566457','direccion'=>'Av Banzer','foto'=>'_Matteo.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Samuel Flores Vega','email' => 'samuel@gmail.com','password' => Hash::make('66778899')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 21,'ppff_id' => 4, 'nombres' =>'Samuel','apellidos'=>'Flores Vega','ci'=>'66778899','fecha_nacimiento' => '2007-06-15','telefono'=>'75566448','direccion'=>'Plan 300','foto'=>'_samuel.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Mariano Vaca Peres','email' => 'mariano@gmail.com','password' => Hash::make('77889900')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 22,'ppff_id' => 5, 'nombres' =>'Mariano','apellidos'=>'Vaca Peres','ci'=>'77889900','fecha_nacimiento' => '2007-07-16','telefono'=>'75566449','direccion'=>'Doble via la Guardia','foto'=>'_mariano.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Santiago Ramires Ardaya','email' => 'santiago@gmail.com','password' => Hash::make('11223344')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 22,'ppff_id' => 6, 'nombres' =>'Santiago','apellidos'=>'Ramires Ardaya','ci'=>'11223344','fecha_nacimiento' => '2007-08-17','telefono'=>'75566440','direccion'=>'Calle 24 de Septiembre','foto'=>'_santiago.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Angela Vaca Guzman','email' => 'angela@gmail.com','password' => Hash::make('22334455')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 23,'ppff_id' => 7, 'nombres' =>'Angela','apellidos'=>'Vaca Guzman','ci'=>'22334455','fecha_nacimiento' => '2007-09-18','telefono'=>'75566441','direccion'=>'Av 16 de Julio','foto'=>'_angela.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Angel Chaves Rodriguez','email' => 'angel@gmail.com','password' => Hash::make('55112233')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 25,'ppff_id' => 8, 'nombres' =>'Angel','apellidos'=>'Chaves Rodriguez','ci'=>'55112233','fecha_nacimiento' => '2007-09-20','telefono'=>'75566443','direccion'=>'Barrio 3 de Mayo','foto'=>'_angel.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Angelo Vaca Guzman','email' => 'angelo@gmail.com','password' => Hash::make('55112234')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 26,'ppff_id' => 9, 'nombres' =>'Angelo','apellidos'=>'Vaca Guzman','ci'=>'55112234','fecha_nacimiento' => '2007-09-21','telefono'=>'75566444','direccion'=>'Barrio los Mangales','foto'=>'_angela.jpg','genero'=>'Femenino','estado' =>'activo']);
        
        User::create(['name' => 'Abel Uria Diaz','email' => 'abel@gmail.com','password' => Hash::make('55112244')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 27,'ppff_id' => 10, 'nombres' =>'Abel','apellidos'=>'Uria Diaz','ci'=>'55112244','fecha_nacimiento' => '2007-09-21','telefono'=>'75566444','direccion'=>'Barrio los Mangales','foto'=>'_angela.jpg','genero'=>'Femenino','estado' =>'activo']);
        
        User::create(['name' => 'Sofia Rojas','email' => 'sofiarojas6@gmail.com','password' => Hash::make('55112255')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 28,'ppff_id' => 1, 'nombres' =>'Sofia','apellidos'=>'Rojas','ci'=>'55112255','fecha_nacimiento' => '2007-01-06','telefono'=>'70000006','direccion'=>'Av Libertad 6','foto'=>'_sofia6.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Pedro Suarez','email' => 'pedrosuarez9@gmail.com','password' => Hash::make('10000009')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 29,'ppff_id' => 2, 'nombres' =>'Pedro','apellidos'=>'Suarez','ci'=>'10000009','fecha_nacimiento' => '2007-01-09','telefono'=>'70000009','direccion'=>'Av Libertad 9','foto'=>'_pedro9.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Jorge Ramirez','email' => 'jorgeramirez11@gmail.com','password' => Hash::make('10000011')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 30,'ppff_id' => 3, 'nombres' =>'Jorge','apellidos'=>'Ramirez','ci'=>'10000011','fecha_nacimiento' => '2007-01-11','telefono'=>'70000011','direccion'=>'Av Libertad 11','foto'=>'_jorge11.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Camila Flores','email' => 'camilaflores12@gmail.com','password' => Hash::make('10000012')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 31,'ppff_id' => 4, 'nombres' =>'Camila','apellidos'=>'Flores','ci'=>'10000012','fecha_nacimiento' => '2007-01-12','telefono'=>'70000012','direccion'=>'Av Libertad 12','foto'=>'_camila12.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Diego Salazar','email' => 'diegosalazar13@gmail.com','password' => Hash::make('10000013')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 32,'ppff_id' => 5, 'nombres' =>'Diego','apellidos'=>'Salazar','ci'=>'10000013','fecha_nacimiento' => '2007-01-13','telefono'=>'70000013','direccion'=>'Av Libertad 13','foto'=>'_diego13.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Paula Gutierrez','email' => 'paulaguti14@gmail.com','password' => Hash::make('10000014')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 33,'ppff_id' => 6, 'nombres' =>'Paula','apellidos'=>'Gutierrez','ci'=>'10000014','fecha_nacimiento' => '2007-01-14','telefono'=>'70000014','direccion'=>'Av Libertad 14','foto'=>'_paula14.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Gabriela Ortiz','email' => 'gabrielaortiz18@gmail.com','password' => Hash::make('10000018')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 34,'ppff_id' => 7, 'nombres' =>'Gabriela','apellidos'=>'Ortiz','ci'=>'10000018','fecha_nacimiento' => '2007-01-18','telefono'=>'70000018','direccion'=>'Av Libertad 18','foto'=>'_gabriela18.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Fernando Chavez','email' => 'fernandochavez19@gmail.com','password' => Hash::make('10000019')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 35,'ppff_id' => 8, 'nombres' =>'Fernando','apellidos'=>'Chavez','ci'=>'10000019','fecha_nacimiento' => '2007-01-19','telefono'=>'70000019','direccion'=>'Av Libertad 19','foto'=>'_fernando19.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Daniela Romero','email' => 'danielaromero20@gmail.com','password' => Hash::make('10000020')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 36,'ppff_id' => 9, 'nombres' =>'Daniela','apellidos'=>'Romero','ci'=>'10000020','fecha_nacimiento' => '2007-01-20','telefono'=>'70000020','direccion'=>'Av Libertad 20','foto'=>'_daniela20.jpg','genero'=>'Femenino','estado' =>'activo']);
     
        User::create(['name' => 'Valeria Mendoza','email' => 'valeriamendoza10@gmail.com','password' => Hash::make('10000010')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 37,'ppff_id' => 10, 'nombres' =>'Valeria','apellidos'=>'Mendoza','ci'=>'10000010','fecha_nacimiento' => '2007-01-10','telefono'=>'70000010','direccion'=>'Av Libertad 10','foto'=>'_valeria10.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Andres Molina','email' => 'andresmolina15@gmail.com','password' => Hash::make('10000015')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 38,'ppff_id' => 1, 'nombres' =>'Andres','apellidos'=>'Molina','ci'=>'10000015','fecha_nacimiento' => '2007-01-15','telefono'=>'70000015','direccion'=>'Av Libertad 15','foto'=>'_andres15.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Natalia Ruiz','email' => 'nataliaruiz16@gmail.com','password' => Hash::make('10000016')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 39,'ppff_id' => 2, 'nombres' =>'Natalia','apellidos'=>'Ruiz','ci'=>'10000016','fecha_nacimiento' => '2007-01-16','telefono'=>'70000016','direccion'=>'Av Libertad 16','foto'=>'_natalia16.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Carlos Lopez','email' => 'carloslopez3@gmail.com','password' => Hash::make('10000003')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 40,'ppff_id' => 3, 'nombres' =>'Carlos','apellidos'=>'Lopez','ci'=>'10000003','fecha_nacimiento' => '2007-01-03','telefono'=>'70000003','direccion'=>'Av Libertad 3','foto'=>'_carlos3.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Ana Torres','email' => 'anatorres4@gmail.com','password' => Hash::make('10000004')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 41,'ppff_id' => 4, 'nombres' =>'Ana','apellidos'=>'Torres','ci'=>'10000004','fecha_nacimiento' => '2007-01-04','telefono'=>'70000004','direccion'=>'Av Libertad 4','foto'=>'_ana4.jpg','genero'=>'Femenino','estado' =>'activo']);
        
        User::create(['name' => 'Patricia Herrera','email' => 'patriciaherrera22@gmail.com','password' => Hash::make('10000022')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 42,'ppff_id' => 5, 'nombres' =>'Patricia','apellidos'=>'Herrera','ci'=>'10000022','fecha_nacimiento' => '2007-01-22','telefono'=>'70000022','direccion'=>'Av Libertad 22','foto'=>'_patricia22.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Oscar Villarroel','email' => 'oscarvillarroel23@gmail.com','password' => Hash::make('10000023')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 43,'ppff_id' => 6, 'nombres' =>'Oscar','apellidos'=>'Villarroel','ci'=>'10000023','fecha_nacimiento' => '2007-01-23','telefono'=>'70000023','direccion'=>'Av Libertad 23','foto'=>'_oscar23.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Elena Salinas','email' => 'elenasalinas24@gmail.com','password' => Hash::make('10000024')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 44,'ppff_id' => 7, 'nombres' =>'Elena','apellidos'=>'Salinas','ci'=>'10000024','fecha_nacimiento' => '2007-01-24','telefono'=>'70000024','direccion'=>'Av Libertad 24','foto'=>'_elena24.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Hugo Cabrera','email' => 'hugocabrera25@gmail.com','password' => Hash::make('10000025')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 45,'ppff_id' => 8, 'nombres' =>'Hugo','apellidos'=>'Cabrera','ci'=>'10000025','fecha_nacimiento' => '2007-01-25','telefono'=>'70000025','direccion'=>'Av Libertad 25','foto'=>'_hugo25.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Florencia Reyes','email' => 'florenciareyes26@gmail.com','password' => Hash::make('10000026')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 46,'ppff_id' => 9, 'nombres' =>'Florencia','apellidos'=>'Reyes','ci'=>'10000026','fecha_nacimiento' => '2007-01-26','telefono'=>'70000026','direccion'=>'Av Libertad 26','foto'=>'_florencia26.jpg','genero'=>'Femenino','estado' =>'activo']);

        User::create(['name' => 'Santiago Peña','email' => 'santiagopena27@gmail.com','password' => Hash::make('10000027')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 47,'ppff_id' => 10, 'nombres' =>'Santiago','apellidos'=>'Peña','ci'=>'10000027','fecha_nacimiento' => '2007-01-27','telefono'=>'70000027','direccion'=>'Av Libertad 27','foto'=>'_santiago27.jpg','genero'=>'Masculino','estado' =>'activo']);

        Matriculacion::create(['estudiante_id' => 1,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 2,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 3,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 4,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 5,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 6,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 7,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 8,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 9,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 10,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 11,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 12,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 13,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 14,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 15,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 16,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 17,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 18,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 19,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 20,'turno_id' => 1,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'fecha_matriculacion' => '2025-01-15']);
        
        Asignacion::create(['personal_id' => 7,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'materia_id' => 9,'turno_id' => 1, 'fecha_asignacion' => '2025-01-15']);
        Asignacion::create(['personal_id' => 8,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 9,'paralelo_id' => 9,'materia_id' => 11,'turno_id' => 1, 'fecha_asignacion' => '2025-01-15']);
        Asignacion::create(['personal_id' => 8,'gestion_id' => 3,'nivel_id' => 3,'grado_id' => 10,'paralelo_id' => 10,'materia_id' => 11,'turno_id' => 1, 'fecha_asignacion' => '2025-01-15']);
        
    }
}
