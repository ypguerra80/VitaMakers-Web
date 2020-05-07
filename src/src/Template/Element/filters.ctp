<?php
/**
 * @var \App\View\AppView $this
 */

use App\Utility\FilterDefinition;
use App\Utility\FilterOperator;
use App\Utility\FilterType;

?>
<div class="crud-filter-container form">
    <h5 class="crud-filter-header"><?= __("Filters") ?></h5>
    <?php
    echo $this->Form->create($filterEntityName, ['method' => 'get', 'url' => ['action' => $action], 'id' => 'filters-form']);
    ?>
    <div class="crud-filter-content row">
        <?php
        $rowOpen = false;
        $index = 0;
        /** @var FilterDefinition $filter */
        foreach ($filters as $filter) {
            if ($index % 2 == 0) {
                $rowOpen = true;
                ?>
                <div class="row">
                <?php
            }
            ?>

            <div class="filter-container large-6 columns">
                <h6><?= $filter->caption ?></h6>
                <?php
                if ($filter->useOperator) {
                    echo $this->Form->control($filter->getSimplePath() . '.operator', ['options' => $filter->operators, 'id' => $filter->getSimplePath() . '_operator', 'val' => $filter->operator, 'templates' => ['inputContainer' => '<span class="filter-operator-wrapper">{{content}}</span>'], 'label' => false]);
                } else {
                    echo $this->Form->hidden($filter->getSimplePath() . '.operator', ['val' => $filter->operator ? $filter->operator : array_keys($filter->operators)[0]]);
                }
                switch ($filter->type) {
                    case FilterType::STRING:
                        echo $this->Form->control($filter->getSimplePath() . '.value', ['type' => 'text', 'id' => $filter->getSimplePath() . '_value', 'val' => $filter->value, 'templates' => ['inputContainer' => '<span class="filter-value-wrapper">{{content}}</span>'], 'label' => false]);
                        break;
                    case FilterType::NUMERIC:
                        echo $this->Form->control($filter->getSimplePath() . '.value', ['type' => 'number', 'id' => $filter->getSimplePath() . '_value', 'val' => $filter->value, 'templates' => ['inputContainer' => '<span class="filter-value-wrapper">{{content}}</span>'], 'label' => false]);
                        break;
                    case FilterType::ENTITY:
                        echo $this->Form->control($filter->getSimplePath() . '.value', ['options' => $filter->entityQuery, 'empty' => true, 'id' => $filter->getSimplePath() . '_value', 'val' => $filter->value, 'templates' => ['inputContainer' => '<span class="filter-value-wrapper">{{content}}</span>'], 'label' => false]);
                        break;
                    case FilterType::DATE:
                        echo $this->Form->control($filter->getSimplePath() . '.value', ['type' => 'text', 'id' => $filter->getSimplePath() . '_value', 'val' => $filter->value, 'templates' => ['inputContainer' => '<span class="filter-value-wrapper">{{content}}</span>'], 'label' => false]);
                        break;
                }
                ?>
            </div>
            <?php
            $index++;
            if ($index % 2 == 0) {
                $rowOpen = false;
                ?>
                </div>
                <?php
            }
        }
        if ($rowOpen) {
        ?>
    </div>
<?php
}
echo $this->Form->button(__('Search'));
echo $this->Form->button(__('Clear'), ['type' => 'button', 'id' => 'clear-crud-filters']);
?>
</div>
<?php
echo $this->Form->end();
?>
</div>
<script type="text/javascript">
    $(function () {

        <?php
            foreach ($filters as $filter){
                if($filter->type == FilterType::ENTITY){
        ?>
                 $("#<?= $filter->getSimplePath() . '_value' ?>").on('change', function(){
                    $('#filters-form').submit();
                 });
        <?php
                }

                if($filter->type == FilterType::DATE){

        ?>
                $("#<?= $filter->getSimplePath() . '_value' ?>")
                    .datepicker(
                        {
                            showButtonPanel: true,
                            dateFormat: "yy-mm-dd"
                        });

        <?php
                }
            }
        ?>

        <?php
        /** @var FilterDefinition $filter */
        foreach ($filters as $filter) {
        $javascriptOnChangeValueFunction = 'handle' . str_replace('-', '_', $filter->getSimplePath()) . 'Change';
        ?>
        function <?= $javascriptOnChangeValueFunction ?>() {
            var operator = $('#<?= $filter->getSimplePath() . '_operator' ?>').val();
            var disabled = operator == <?= FilterOperator::IS_NULL ?> || operator == <?= FilterOperator::IS_NOT_NULL ?>;
            $('#<?= $filter->getSimplePath() . '_value' ?>').attr('disabled', disabled);
            if (disabled) {
                $('#<?= $filter->getSimplePath() . '_value' ?>').val(null);
            }
        }

        $('#<?= $filter->getSimplePath() . '_operator' ?>').change(function () {
            <?= $javascriptOnChangeValueFunction ?>();
        });
        <?= $javascriptOnChangeValueFunction ?>();
        <?php
        }
        ?>

        function clearCRUDFilters() {
            <?php
            foreach ($filters as $filter) {
                ?>
                $('#<?= $filter->getSimplePath() . '_operator' ?>').val(<?= current(array_keys($filter->operators)) ?>);
                $('#<?= $filter->getSimplePath() . '_value' ?>').attr('disabled', false);
                $('#<?= $filter->getSimplePath() . '_value' ?>').val(null);
            <?php
            }
            ?>
        }

        $('#clear-crud-filters').click(function(e) {
           e.preventDefault();
           clearCRUDFilters();
           $('#filters-form').submit();
        });
    });

</script>