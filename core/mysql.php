<?php
    function  insere(string $entidade, array $dados) : bool
    {
        $retorno = false;

        foreach($dados as $campo => $ dado){
            $coringa[$campo] = '?';
            $tipo[] = gettype($dado)[0];
            $$campo = $dado;
        }

        $instrucao = insert($entidade, $coringa);

        $conexao = conecta();

        $stmt = mysqli_prepare($conexao, $instrucao);

        eval('mysqli_stms_bind_param($stmt, \''.implode('', $tipo). '\', $'.implode(',$', array_keys($dados)) . ');');

        mysqli_stmt_execute($stmt);

        $retorno = (boolean) mysqli_stmt_affected_rows($stmt);

        $_SESSION['errors'] = mysqli_stmt_error_list($stmt);

        mysqli_stmt_close($stmt);

        desconecta($conexao);

        return $retorno;
    }
    function atualiza (string $entidade, array $dados, array $criterio []): bool
    {
        $retorno false;

        foreach ($dados as $campo -> $dado) {
            $coringa_dados [$campo] = '?';
            $tipo[] = gettype ($dado) [0]; 
            $$campo $dado;
        }

        foreach ($criterio as $expressao){

            $dado = $expressao [count ($expressao) -1];

            $tipo[] = gettype ($dado)[0];
            $expressao [count ($expressao) - 1] = '?';
            $coringa_criterio[] = $expressao;

            $nome_campo = (count($expressao) < 4) ? $expressao[0]: $expressao[1];
        
        if (isset($nome_campo)){

            $nome_campo = $nome_campo . ' '. rand();
        }
        
        $campos_criterio[] = $nome_campo;
        $$nome_campo = $dado;
    }

    $instrucao = update ($entidade, $coringa_dados, $coringa_criterio);

    $conexao = conecta();

    $stmt = mysqli_prepare($conexao, $instrucao);

    if(isset($tipo)){
        $comando = 'mysqli_stmt_bind_param($stmt, ';
        $comando .= "'" . implode('', $tipo). "'";
        $comando .=  ', $' . implode(', $', array_keys ($dados)); 
        $comando .= ', $' . implode(', $', $campos_criterio);
        $comando .= ');';

        eval($comando);
    }

    mysqli_stmt_execute($stmt);

    $retorno = (boolean) mysqli_stmt_affected_rows($stmt);

    $_SESSION['errors'] =  mysqli_stmt_error_list($stmt);

    mysqli_stmt_close ($stmt);

    desconecta ($conexao):

    return $retorno;
    }

    function deleta (string $entidade, array $criterio = []) : bool

    $retorno = false:
    $coringa_criterio = [];

    foreach ($criterio as $expressao){
        
    }

09

100

102

Stipo] gettype (Sdado) [0]

107

303

Sdado Sexpressao [count (Sexprensao)-111

Sexpressao [count (Sexpressao) 11-77

Scoringa criterio Sexprensaor

194

105

Snome campо (count($xpressao) < 41 Sexpressao): Sexpressao[1];

100

10%

Scampos criterio nome campo:

100

200

Sdadoz

130

311

112

@instrucao delete (Suntidade, Scoringa_criteriol r

313

114

Sconexao conecta (12

115

116

Satmt mysqli prepare (Sconexao, Sinstrucao):

117

210

if(isset(Stipo))( Scomando myngii atat bind paran (Sant,

119

120

Sccomando implode, Stipoj

131

Scomando implode (1 Seampon criterio);

122

Scomanda

324

eval (Scomando):

120

126

127

mysqli stmt execute (Outmt);

128

129

Sretorno (boolean) mysqli_stmt_affected rows(Satant)

130

131

BERSION" mysqli_stmt_error_list(stmt);

mysqli stat close(Satmt):

134

desconecta (Sconexao);

136

137

return Sretorno,
?>