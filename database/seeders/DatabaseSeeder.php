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
            'password' => Hash::make('12345678')
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
            'foto' => 'uploads/fotos/'.time().'_carlos.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_ana.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_jorge.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_lucia.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_roberto.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_sofia.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_mario.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_mauricio.jpg',
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
            'foto' => 'uploads/fotos/'.time().'_marialeny.jpg',
        ]);

        Ppff::create(['nombres' => 'Luis Fernando','apellidos'=>'Gomez Perez','ci'=>'11112222','fecha_nacimiento'=> '1981-06-18','telefono'=> '70112233','parentesco'=>'Padre','ocupacion'=>'Ingeniero de Sistemas','direccion'=>'Av cumavi']);
        Ppff::create(['nombres' => 'Maria Luisa','apellidos'=>'Alba Rios','ci'=>'22223333','fecha_nacimiento'=> '1982-03-22','telefono'=> '70223344','parentesco'=>'Madre','ocupacion'=>'Ama de Casa','direccion'=>'Av eucalipto']);
        Ppff::create(['nombres' => 'Roberto Carlos','apellidos'=>'Mendez Flores','ci'=>'33334444','fecha_nacimiento'=> '1979-03-15','telefono'=> '70334455','parentesco'=>'Hermana','ocupacion'=>'Estudiante','direccion'=>'Av la Salle']);
        Ppff::create(['nombres' => 'Ana Patricia','apellidos'=>'Diaz Castro','ci'=>'44445555','fecha_nacimiento'=> '1982-11-30','telefono'=> '70445566','parentesco'=>'Madre','ocupacion'=>'Secretaria','direccion'=>'Villa 1ero de Mayo']);
        Ppff::create(['nombres' => 'Gabriela','apellidos'=>'Torrez Mendoza','ci'=>'55556666','fecha_nacimiento'=> '1986-07-20','telefono'=> '70556677','parentesco'=>'Madre','ocupacion'=>'Secretaria','direccion'=>'Doble Via la Guardia']);
        Ppff::create(['nombres' => 'Carolina','apellidos'=>'Romero Salazar','ci'=>'66667777','fecha_nacimiento'=> '1988-08-21','telefono'=> '70667788','parentesco'=>'Hermana','ocupacion'=>'Estudiante','direccion'=>'Av Banzer']);
        Ppff::create(['nombres' => 'Mario','apellidos'=>'Suarez Velasco','ci'=>'77778888','fecha_nacimiento'=> '1985-08-22','telefono'=> '70778899','parentesco'=>'Padre','ocupacion'=>'Tutor','direccion'=>'Plan 3000']);

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
        Estudiante::create(['usuario_id' => 22,'ppff_id' => 5, 'nombres' =>'Santiago','apellidos'=>'Ramires Ardaya','ci'=>'11223344','fecha_nacimiento' => '2007-08-17','telefono'=>'75566440','direccion'=>'Calle 24 de Septiembre','foto'=>'_santiago.jpg','genero'=>'Masculino','estado' =>'activo']);

        User::create(['name' => 'Angela Vaca Guzman','email' => 'angela@gmail.com','password' => Hash::make('22334455')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 23,'ppff_id' => 6, 'nombres' =>'Angela','apellidos'=>'Vaca Guzman','ci'=>'22334455','fecha_nacimiento' => '2007-09-18','telefono'=>'75566441','direccion'=>'Av 16 de Julio','foto'=>'_angela.jpg','genero'=>'Femenino','estado' =>'activo']);

    }
}
