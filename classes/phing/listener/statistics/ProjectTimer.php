<?php
/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information please see
 * <http://phing.info>.
 */

include_once 'phing/listener/statistics/StatsTimer.php';
include_once 'phing/listener/statistics/TimerMap.php';

/**
 * A logger which logs nothing but build failure and what task might output.
 *
 * @author    Siad Ardroumli <siad.ardroumli@gmail.com>
 * @package   phing.listener.statistics
 */
class ProjectTimer extends StatsTimer
{
    private $targetMap;

    private $taskMap;

    public function __construct($name, Clock $clock)
    {
        parent::__construct($name, $clock);
        $this->targetMap = new TimerMap();
        $this->taskMap = new TimerMap();
    }

    public function getTargetTimer($name)
    {
        return $this->targetMap->find($name, $this->clock);
    }

    public function getTaskTimer($name)
    {
        return $this->taskMap->find($name, $this->clock);
    }

    public function toTargetSeriesMap()
    {
        return $this->targetMap->toSeriesMap();
    }

    public function toTaskSeriesMap()
    {
        return $this->taskMap->toSeriesMap();
    }
}
