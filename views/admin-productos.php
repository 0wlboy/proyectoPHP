<?php 
  session_start();
  if(!$_SESSION || !$_SESSION['email'] || $_SESSION['rol'] != 'admin'){
    header("Location: ./sing-in.php");
  }

  require_once "./../models/home.models.php";
  $result = viewProducts('productos');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
      <title>Adminnistrador de Productos</title>
  </head>
  <body>
    <a href="profile.php">Perfil</a>
    <h1 class="mb-4 text-4xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl" >Administrador de Productos</h1>
    <div class="mt-10  mx-4 max-w-7xl">
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID del producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre del producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen del producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantiddad en stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                  <?php 
                    while ($row = mysqli_fetch_assoc($result)){
                  ?>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['ID'] ?>
                      </th>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['nombre'] ?>
                      </th>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php 
                        $img_dir = $row['imagen_producto']; 
                        echo "<img src='./../$img_dir' alt='imagen' width='100' height='100'>";
                        ?>
                      </th>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['precio'] ?>
                      </th>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['cantidad_stock'] ?>
                      </th>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['descripcion'] ?>
                      </th>

                    <?php
                      }
                    ?>
                </tr>
                </tbody>
            </table>
      </div>
    </div>
   


    <a href="./sing-out.php">Sing-out</a>
  </body>
</html>