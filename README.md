# API-Rest-w-MySQL-PHP
API Rest orientada al manejo de empleados, creada con MySQL y PHP

Instrucciones de uso:
  > Crear la tabla SQL en alguna base de datos. Puede hacerlo importando el archivo 'staff.sql'
  > Hostear el archivo 'index.php'
  
Llamadas a la API:
  > url/?consult
    -Llamamos a todos los registros
  > url/?consult=id
    -Llama los registros correspondientes al id
  > url/?delete=id
    -Elimina el registro correspondiente al id
  > url/?update=id
    -Actualiza el registro correspondiente al id pasándole como parte del body un objeto {id, worker_name, email}
  > url/?insert
    -Crea un registro pasándole como parte del boyd un objeto {worker_name, email}
