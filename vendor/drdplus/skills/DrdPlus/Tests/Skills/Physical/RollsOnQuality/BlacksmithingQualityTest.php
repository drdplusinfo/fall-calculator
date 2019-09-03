<?php declare(strict_types=1);

declare(strict_types = 1);

namespace DrdPlus\Tests\Skills\Physical\RollsOnQuality;

use DrdPlus\Skills\Skill;
use DrdPlus\Tests\Skills\RollOnQualityWithSkillTest;

class BlacksmithingQualityTest extends RollOnQualityWithSkillTest
{

    /**
     * @param int $bonusToRoll
     * @return Skill|\Mockery\MockInterface
     */
    protected function createSkill(int $bonusToRoll): Skill
    {
        $skill = $this->mockery($this->getSutConstructorParameterClass(1));
        $skill->shouldReceive('getBonusToKnack')
            ->andReturn($bonusToRoll);

        return $skill;
    }
}