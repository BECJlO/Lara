<?php

public abstract class BaseTasks
{
    public abstract function getTypesWorker();
    public abstract function getDescription();
    public abstract function getStatus($id);
}
