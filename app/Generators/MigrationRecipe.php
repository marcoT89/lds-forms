<?php

namespace App\Generators;

use App\Generators\Traits\Stubs;

class MigrationRecipe extends Recipe
{
    public function make()
    {
        $tableName = $this->getTableName($this->model);
        $timestamp = now()->format('Y_m_d_His');
        $filename  = '{{timestamp}}_create_{{tableName}}_table.php';
        $filename  = str_replace(['{{timestamp}}', '{{tableName}}'], [$timestamp, $tableName], $filename);
        $filename  = "database/migrations/{$filename}";

        return $this->createFileFromStub(
            'Migration',
            [
                'DummyClassPlural',
                'DummyTableName',
                'DummyTableSchema',
            ],
            [
                str_plural($this->model),
                $tableName,
                $this->getSchema($this->fields),
            ],
            $filename
        );
    }

    private function getTableName($model)
    {
        return str_plural(snake_case($model));
    }

    protected function getSchema($fields)
    {
        return $this->getFields()->map(function ($field) {
            return "\n" . $this->indent(12, $field->getSchema());
        })->implode('');
    }
}
