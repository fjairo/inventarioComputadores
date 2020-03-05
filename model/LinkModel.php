    <?php

    class enlacesModel
    {
        public function enlacesPaginasModel($enlaces)
        {
            if (
                $enlaces == "EntranceView" ||
                $enlaces == "InventoryView" ||
                $enlaces == "ExitView" ||
                $enlaces == "EditView"
            ) {
                $enlacePagina = "view/User/" . $enlaces . ".php";
            } else if ($enlaces == "index") {
                $enlacePagina = "view/User/RecordView.php";
            } else if ($enlaces == "ok") {
                $enlacePagina = "view/User/RecordView.php";
            } else if ($enlaces == "fallo") {
                $enlacePagina = "view/User/EntranceView.php";
            } else if ($enlaces == "cambio") {
                $enlacePagina = "view/User/inventoryView.php";
            } else {
                $enlacePagina = "view/User/RecordView.php";
            }
            return $enlacePagina;
        }
    }
    ?>