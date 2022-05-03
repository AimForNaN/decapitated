<?php $this->layout('layouts::main', ['data' => $data]); ?>

<?php $this->push('scripts') ?>
    <script src="example.js"></script>
<?php $this->end() ?>

<?= $data->hello; ?>
