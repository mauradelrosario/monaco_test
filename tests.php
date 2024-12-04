<?php
 require_once 'exercice1/jolichat.php';
 require_once 'exercice2/rotation.php';

class TestExercices {
    private array $results = [];

    public function testExercice1(): void {
        $results = ['details' => []];
        $testCases = [
            ['input' => 1, 'expected' => "1"],
            ['input' => 2, 'expected' => "2"],
            ['input' => 3, 'expected' => "Joli"],
            ['input' => 5, 'expected' => "Chat"],
            ['input' => 15, 'expected' => "JoliChat"],
            ['input' => 30, 'expected' => "JoliChat"]
        ];

        foreach ($testCases as $test) {
            $result = isMultipleOf($test['input']);
            $passed = $result === $test['expected'];
            $results['details'][] = [
                'input' => $test['input'],
                'expected' => $test['expected'],
                'actual' => $result,
                'passed' => $passed
            ];
        }
    
        $this->results['Exercice 1'] = $results;
    }


    public function testExercice2(): void {
        $results = ['details' => []];
        $testCases = [
            ['input' => ['Soleil', 'leilSo'], 'expected' => true],
            ['input' => ['Magenta', 'agentaM'], 'expected' => true],
            ['input' => ['Bleu', 'eulB'], 'expected' => false],
            ['input' => ['', ''], 'expected' => false],
            ['input' => ['Monaco', 'coMona'], 'expected' => true],
            ['input' => ['test', 'tset'], 'expected' => false]
        ];

        foreach ($testCases as $test) {
            $result = isRotation($test['input'][0], $test['input'][1]);
            $passed = $result === $test['expected'];
            $results['details'][] = [
                'input' => $test['input'],
                'expected' => $test['expected'],
                'actual' => $result,
                'passed' => $passed
            ];
        }
    
        $this->results['Exercice 2'] = $results;
    }

    public function printResults(): void {
        echo "\n";
        echo "🔍 Tests PHP\n";
        echo "=======================\n";
        foreach ($this->results as $exerciceName => $results) {
            echo "🔸🔸🔸 $exerciceName:\n"; 

            foreach ($results['details'] as $detail) {
                $symbol = $detail['passed'] ? "✅" : "❌";
                if (is_array($detail['input'])) {
                    echo "$symbol Input: '{$detail['input'][0]}', '{$detail['input'][1]}'\n";
                    echo "   Expected: " . ($detail['expected'] ? 'true' : 'false') . "\n";
                    echo "   Got: " . ($detail['actual'] ? 'true' : 'false') . "\n";
                } else {
                echo "$symbol Input: {$detail['input']}\n";
                echo "   Expected: {$detail['expected']}\n";
                    echo "   Got: {$detail['actual']}\n";
                }
            }
        }
    }
}

$tester = new TestExercices();
$tester->testExercice1();
$tester->testExercice2();
$tester->printResults();
?>
