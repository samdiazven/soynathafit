<?php 
    function base_url()
    {
        return BASE_URL;
    }

    function dep($data)
    {
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    function passGenerator()
    {
        $pass = "";
        $longitudPass = 10;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena = strlen($cadena);
        for( $i=1; $i<$longitudPass; $i++)
        {
            $pass .= $cadena[rand(0, $longitudCadena - 1)];
        }
        return $pass;
    }
    function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1 . '-'. $r2. '-'. $r3. '-'. $r4;
        return $token;
    }
    function media()
    {
        return BASE_URL."/Assets";
    }
    function headerAdmin($data="")
    {
        $view_header = "Views/Template/header_admin.php";
        require_once($view_header);
    }
    function footerAdmin($data="")
    {
        $view_footer = "Views/Template/footer_admin.php";
        require_once($view_footer);
    }
    //MODALES
    function getModal(string $name, $data)
    {
        $view_modal = "Views/Template/Modals/{$name}.php";
        require_once($view_modal);
    }
    function getRole(int $role){
        switch ($role)
        {
            case 1:
                return 'Usuario';
                break;
            case 2: 
                return 'Entrenador';
                break;
            case 3:
                return 'Nutricionista';
                break;
            case 4:
                return 'Administrador';
                break;
            case 5:
                return 'Master';
                break;
        }
    }
    function getGrease(float $waist, string $gender, int $age) {
        if($gender === "masculino") {
            $formula = 0.567 * $waist + 0.101 + $age - 31.8;
        }else {
            $formula = 0.439 * $waist + 0.221 * $age - 9.4;
        }
        return $formula;
    }
    function getIMC(float $weight, float $height) {
        $formula = $weight / $height ** 2;
        return $formula;
    }
?>