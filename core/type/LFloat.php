<?php
namespace epm\core\type;

class LFloat
{

    /**
     *
     * @var array $_data
     */
    private $_data;

    /**
     *
     * @var int $_lang_id
     */
    private $_lang_id;

    public function __construct(int $lang_id = 0, array $data = null): LFloat
    {
        $this->_data = array();
        $this->_lang_id = $lang_id;
        if ($data !== null) {
            $this->_data = $data;
            foreach ($this->_data as $k => $v) {
                $this->_data[$k] = (float) $v;
            }
        }
        return $this;
    }

    public function add(int $lang_id, $str): LFloat
    {
        $this->_data[(int) $lang_id] = (float) $str;
        return $this;
    }

    public function get($lang_id): float
    {
        return $this->_data[(int) $lang_id];
    }

    public function getAll(): array
    {
        return $this->_data;
    }

    public function __toString()
    {
        return '' + $this->get($this->_lang_id);
    }
}