<?php
// Copyright 2022 pat
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//     http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

Yii::import('system.web.filters.CFilter');

class LoginFilter extends CFilter
{
    protected function preFilter($filterChain)
    {
        // La logique à appliquer avant que l'action soit exécutée
        return true; // false si l'action ne doit pas être exécuté
    }
 
    protected function postFilter($filterChain)
    {
        // La logique à appliquer après que l'action soit exécutée
    }
}