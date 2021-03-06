<?php

namespace App\Traits\Generators;

trait GenerateRecipes
{
    public function makeRecipes(array $recipes)
    {
        collect($recipes)->each(function ($recipeClass) {
            $recipeClassName = collect(explode('\\', $recipeClass))->last();
            $recipeName = str_replace('-', ' ', kebab_case(str_replace('ModelRecipe', '', $recipeClassName)));
            $recipe = new $recipeClass($this);
            $this->comment("Making $recipeName...");
            $result = $recipe->make();

            if (is_iterable($result)) {
                foreach ($result as $filename) {
                    $this->info($filename);
                }

                return;
            }
            $this->info($result);
        });
    }
}
