<table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Cuil</th>
            <th>N° Legajo</th>
            <th>Tipo de Autorización</th>
            <th>De</th>
            <th>Hasta</th>
            <th>Motivo</th>
            <th>Fecha Petición</th>
            <th>Materia</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $autorianual; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->nombre_usuario); ?></td>
                <td><?php echo e($user->cuil); ?></td>
                <td><?php echo e($user->legajo); ?></td>
                <td><?php echo e($user->tipo_autorizacion); ?></td>
                <td><?php echo e($user->fecha_de); ?></td>
                <td><?php echo e($user->fecha_hasta); ?></td>
                <td><?php echo e($user->motivo); ?></td>
                <td><?php echo e($user->fecha_creacion); ?></td>
                <td><?php echo e($user->materia); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>