<?php

namespace App\Services;

use App\Rules\RuleOne;
use App\Rules\RuleTwo;
use App\Rules\RuleThree;

class DiwaliSaleService
{
    protected RuleOne $ruleOne;
    protected RuleTwo $ruleTwo;
    protected RuleThree $ruleThree;

    public function __construct(RuleOne $ruleOne, RuleTwo $ruleTwo, RuleThree $ruleThree)
    {
        $this->ruleOne = $ruleOne;
        $this->ruleTwo = $ruleTwo;
        $this->ruleThree = $ruleThree;
    }

    /**
     * @param array $products
     * @param string $rule
     * @return array
     */
    public function applyRules(array $products, string $rule): array
    {
        rsort($products);
        if ($rule === 'rule_three' && count($products) >= 4) {
            return $this->ruleThree->apply($products);
        }

        if ($rule === 'rule_two' && count($products) >= 2) {
            return $this->ruleTwo->apply($products);
        }

        return $this->ruleOne->apply($products);
    }
}