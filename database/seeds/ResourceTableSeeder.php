<?php
use Illuminate\Database\Seeder;
use App\Resource;
use App\User;

class ResourceTableSeeder extends Seeder
{
    public function run()
    
    {
        $nome = ["Julio Henrique", "Sidny", "Monique", "Wandell", "Leonardo Santigo", "Josevaldo das Dores"];
        $sobrenome = ["dos Santos", "Molina", "Monteiro", "Rodrigues", "Santiago", "Lima"];
        $email = ["tecjuliohenrique@gmail.com", "sidny.molina@gmail.com", "moniquemonteiro180@gmail.com", "wandell@startupsemnome.com.br", "santiago@startupsemnome.com.br", "josevaldo@startupsemnome.com.br"];
        $senha = ["1212", "1212", "1212", "1212", "1212", "1212"];

        //DADOS PESSOAIS
        $fotoperfil = ["", "", "", "", "", ""];
        $dt_nascimento = ["1944-08-21", "1994-12-29", "1995-08-19", "1996-09-23", "1998-09-21", "1992-03-29"];
        $genero = ["Masculino", "Masculino", "Feminino", "Masculino", "Masculino", "Masculino"];
        $estado_civil = ["Casado", "Solteiro", "Casado", "Solteiro", "Solteiro", "Solteiro"];
        $nacionalidade = ["Brasileiro", "Español", "Francesa", "Cubano", "Portuguese", "Español"];
        $uf = ["SP", "SP", "RS", "MG", "SP", "RJ"];
        $cidade = ["São Paulo", "São Paulo", "Canela", "Piranguinho", "São Paulo", "Paraty"];
        $disponibilidade = ["Semanal", "Semanal", "Semanal", "Semanal", "Semanal", "Semanal"];
        $resumo_profissional = ["Minha vida toda como Full Stack", "Minha vida toda como Analista de Projetos", "Minha vida toda como PMO", "Minha vida toda como Especialista", "Minha vida toda como Especialista", "Minha vida toda como Especialista"];
        $categoria = ["Tecnologia", "Tecnologia", "Tecnologia", "Engenharia Eletrônica", "Arquitetura", "Arquitetura"];

        //EXPERIENCIA PROFISSIONAL
        $empresa = ["Microsoft", "IBM","Microsoft","Dell", "AgroTec", "AgroTec"];
        $segmento = ["Tecnologia", "Tecnologia","Tecnologia","Tecnologia", "Agronomia", "Agronomia"];
        $dt_empresa_inicio = ["2000-09-02", "2000-09-02","2000-09-02","2000-09-02", "2000-09-02", "2000-09-02"];
        $dt_empresa_saida = ["2019-09-12", "2019-09-12","2019-09-12","2019-09-12", "2019-09-12", "2019-09-12"];
        $cargo = ["Full Stack", "Analista de Projetos","PMO","Especialista de Desenvolvimento", "Especialista de Desenvolvimento", "Especialista de Negócios"];
        $atividades = ["Desenvolver", "Analistar","Gerenciar","Gerenciar", "Gerenciar", "Gerenciar"];

        //FORMAÇÃO
        $curso = ["Sistemas de Informação", "Sistemas de Informação","Sistemas de Informação","Sistemas de Informação", "Sistemas de Informação", "Sistemas de Informação"];
        $instituicao = ["USJT", "USJT","USJT","USJT", "USJT", "USJT"];
        $dt_curso_inicio = ["2016-02-02", "2016-02-02","2016-02-02","2016-02-02", "2016-02-02", "2016-02-02"];
        $dt_curso_conclusao = ["2019-12-12", "2019-12-12","2019-12-12","2019-12-12", "2019-12-12", "2019-12-12"];
        $info_complementares = ["Agilista, prestativo e carinhoso", "Agilista, prestativo e carinhoso","Agilista, amorosa e carinhosa","Agilista, prestativo e carinhoso", "Agilista, prestativo e carinhoso", "Agilista, prestativo e carinhoso"];
        $accept_project = [true, false, false, true, true, true, false, true, true, false, true, true]; 
        $formacao = ["Ensino Superior","Ensino Superior","Ensino Superior","Ensino Superior","Ensino Superior","Ensino Superior","Ensino Superior"];

        // $curso = ["SP", "SP","SP","SP", "SP", "RJ"];
        // $telefone = ["11 4821-1220", "11 3434-9988", "11 6454-0990", "11 3489-4444", "11 2322-1122", "22 2345-9890"];
        // $endereco = ["Rua blabalbalabbal", "Rua dos Marinhas", "Rua dos Picles", "Rua de Mauá", "Rua dos Espanhois", "Av Tiradentes"];
        // $celular = ["11 94821-1220", "11 98876-0909", "11 9878-8877", "11 92223-2938", "11 92345-9789", "22 98980-0012"];
        // $cidade = ["São Paulo", "São Paulo", "São Paulo", "São Paulo", "São Paulo", "Rio de Janeiro"];
        // $habilidades = ["Full Stack", "Frontend e Backend", "Full Stack", "Frontend e Backend", "Gestão de Negócios", "Administrador de Dados"];
        // $area_interesse = ["Tecnologia", "Tecnologia e Gestão", "Tecnologia e Gestão", "Tecnologia", "Gestão, Negócios e Tecnologia", "Engenharias"];
        $message1 = ["goll", "goll", "goll", "goll", "goll", "goll"]; 
        $problem_id = [1]; 
        
        for ($i=0; $i < 6; $i++) { 
          $resource = new Resource;
          $resource->nome = $nome[$i];
          $resource->sobrenome = $sobrenome[$i];
          $resource->email = $email[$i];
          $resource->senha = $senha[$i];

          //DADOS PESSOAIS
          $resource->fotoperfil = $fotoperfil[$i];
          $resource->dt_nascimento = $dt_nascimento[$i];
          $resource->genero = $genero[$i];
          $resource->estado_civil = $estado_civil[$i];
          $resource->nacionalidade = $nacionalidade[$i];
          $resource->uf = $uf[$i];
          $resource->cidade = $cidade[$i];
          $resource->disponibilidade = $disponibilidade[$i];
          $resource->resumo_profissional = $resumo_profissional[$i];
          $resource->categoria = $categoria[$i];

          //EXPERIÊNCIA PROFISSIONAL
          $resource->empresa = $empresa[$i];
          $resource->segmento = $segmento[$i];
          $resource->dt_empresa_inicio = $dt_empresa_inicio[$i];
          $resource->dt_empresa_saida = $dt_empresa_saida[$i];
          $resource->cargo = $cargo[$i];
          $resource->atividades = $atividades[$i];

          //FORMAÇÃO
          $resource->curso = $curso[$i];
          $resource->instituicao = $instituicao[$i];
          $resource->dt_curso_inicio = $dt_curso_inicio[$i];
          $resource->dt_curso_conclusao = $dt_curso_conclusao[$i];
          $resource->info_complementares = $info_complementares[$i];
          
          // $resource->habilidades = $habilidades[$i];
          // $resource->area_interesse = $area_interesse[$i];
          // $resource->estado = $estado[$i];
          // $resource->telefone = $telefone[$i];
          // $resource->endereco = $endereco[$i];
          // $resource->celular = $celular[$i];
          // $resource->cidade = $cidade[$i];

          $resource->formacao = $formacao[$i];
          $resource->accept_project = $accept_project[$i];
          $resource->message1 = $message1[$i];
          $resource->problem_id = 1;          
          $resource->save();

          $user = new User;
          $user->name = $nome[$i]." ".$sobrenome[$i];
          $user->email = $email[$i];
          $user->password = $senha[$i];
          $user->type = "RESOURCE";
          $user->save();
        }  
    }
    
}