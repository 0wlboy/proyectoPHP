<?php

session_start();
if(!$_SESSION && !$_SESSION['email']){
  header("Location: ./sing-in.php");
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Cargar Productos</title>
</head>
  <div class="pt-10" >
    <h1 class="text-3xl font-bold text-center uppercase py-5">Cargar Productos</h1>
      <form class="bg-blue-950 rounded-lg max-w-sm mx-auto flex flex-col justify-center p-5 gap-5" method='POST' enctype="multipart/form-data" action="">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de Producto</label>
                <input type="text" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre" required />
            </div>
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="imagen">Subir imagen</label>
              <input name="imagen" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="img_input_help" type="file">
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="img_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
            </div>
              
            <div>
                <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                <input type="number" id="precio" name="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Precio" required />
            </div>
            <div>
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad en Stock</label>
                <input type="number" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Stock" required />
            </div>  
            <div>
                
              <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
              <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe el producto..."></textarea>

            </div>
        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
  </div>
  <?php
    require_once("./../controllers/load-products.controller.php");
  ?>
</body>
</html>