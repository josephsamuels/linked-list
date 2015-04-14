<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LinkedListSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\LinkedList');
    }

    function it_adds_one_element_to_list()
    {
        $this->add('Hello');

        $this->get(0)->shouldReturn('Hello');
    }

    function it_throws_error_for_bad_indexes()
    {
        $this->shouldThrow('OutOfBoundsException')->duringGet(-1);
        $this->shouldThrow('OutOfBoundsException')->duringGet(0);
    }

    function it_adds_two_elements_to_list()
    {
        $this->add('Hello');
        $this->add('World');

        $this->get(0)->shouldReturn('Hello');
        $this->get(1)->shouldReturn('World');
    }

    function it_inserts_an_element_at_index()
    {
        $this->add('Hello');
        $this->add('World');

        $this->insert('there', 1);

        $this->get(1)->shouldReturn('there');
    }

    function it_removes_an_element_at_index()
    {
        $this->add('Hello');
        $this->add('jerk');
        $this->add('World');

        $this->remove(1)->shouldReturn('jerk');
        $this->get(1)->shouldReturn('World');
    }

    function it_returns_the_index_of_item()
    {
        $this->add('Hello');
        $this->add('World');

        $this->indexOf('World')->shouldEqual(1);
    }

    function it_returns_negative_one_if_item_not_found()
    {
        $this->add('Hello');
        $this->add('World');

        $this->indexOf('there')->shouldEqual(-1);
    }

    function it_returns_array_of_elements_in_list()
    {
        $this->add(1);
        $this->add(2);
        $this->add(3);
        $this->add(4);
        $this->add(5);

        $this->toArray()->shouldReturn([1, 2, 3, 4, 5]);
    }
}
