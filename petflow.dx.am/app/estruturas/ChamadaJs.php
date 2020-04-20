<?php

namespace app\estruturas;

class ChamadaJs {

    public static function chamadaJs($caminho) {
        /* Bootstrap */
        echo"<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>";
        echo"<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>";
        echo"<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js' integrity='sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P' crossorigin='anonymous'></script>";

        /* imask */
        echo"<script src='https://unpkg.com/imask'></script>";

        /* ajax */
        echo" <script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>";
        echo"<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>";

        /* jquery */
        echo"<script src='{$caminho}assets/package/jquery/js/jquery-1.11.1.min.js'></script>";
        echo"<script src='{$caminho}assets/package/jquery/js/jquery.backstretch.min.js'></script>";

        /* uikit */
        echo"<script src='{$caminho}assets/package/uikit/js/uikit.min.js'></script>";
        echo"<script src='{$caminho}assets/package/uikit/js/uikit-icons.min.js'></script>";
    }
}