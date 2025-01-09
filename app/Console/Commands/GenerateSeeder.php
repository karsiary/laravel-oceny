<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;
use App\Models\User;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\GradeHistory;
use Illuminate\Support\Facades\File;

class GenerateSeeder extends Command
{
    protected $signature = 'make:seeder-from-db';
    protected $description = 'Generate seeders from current database data';

    public function handle()
    {
        $this->generateSeeder('Role', Role::all());
        $this->generateSeeder('User', User::all());
        $this->generateSeeder('Subject', Subject::all());
        $this->generateSeeder('Grade', Grade::all());
        $this->generateSeeder('GradeHistory', GradeHistory::all());

        $this->info('Seedery zostały wygenerowane pomyślnie!');
    }

    private function generateSeeder($model, $data)
    {
        $seederPath = database_path("seeders/{$model}Seeder.php");
        $seederContent = "<?php\n\n";
        $seederContent .= "namespace Database\Seeders;\n\n";
        $seederContent .= "use Illuminate\Database\Seeder;\n";
        $seederContent .= "use App\Models\\{$model};\n\n";
        $seederContent .= "class {$model}Seeder extends Seeder\n";
        $seederContent .= "{\n";
        $seederContent .= "    public function run(): void\n";
        $seederContent .= "    {\n";
        
        foreach ($data as $item) {
            $attributes = json_encode($item->getAttributes(), JSON_PRETTY_PRINT);
            $seederContent .= "        {$model}::create({$attributes});\n";
        }
        
        $seederContent .= "    }\n";
        $seederContent .= "}\n";

        File::put($seederPath, $seederContent);
        $this->info("{$model}Seeder został wygenerowany.");
    }
} 