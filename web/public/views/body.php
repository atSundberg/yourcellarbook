<section class="section">
    <span x-html="bodyData"></span>
</section>

<script>
function SLComp() {
    return {
        stocks: [],

        fetchInfo() {
            if (this.stocks.length > 0) {
                return;
            }
            fetch('./api/v1/stocks').then((response) => response.json()).then(json => {
                console.log("stocks.Rcv:", json)
                this.stocks = json.data

                // Fix the data...
                this.stocks = this.stocks.map(rec => ({
                    ...rec,
                    level: ((rec["last_close"] - rec["stop_loss"]) / rec["last_close"]) * 100,
                }));

                console.log("stocks.2:", this.stocks)
            }).catch(function() {
                console.log("Problem fetching!")
            })
        }
    }
}

function RegComp() {
    const FORM_URL = "./api/v1/cmd/stockadd";
    return {
        open: false,
        formLoading: false,
        formMessage: "",
        formData: {
            name: '',
            email: '',
            pwd: '',
            ticker: '',
        },
        submitForm() {
            console.log(JSON.stringify(this.formData));
            this.formLoading = false;
            this.formMessage = "";
            fetch(FORM_URL, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.formData),
                })
                .then(() => {
                    this.formData.name = "";
                    this.formData.email = "";
                    this.formData.pwd = "";
                    this.formData.ticker = "";
                    this.formMessage = "Form successfully submitted.";
                })
                .catch(() => {
                    this.formMessage = "Something went wrong.";
                })
                .finally(() => {
                    this.formLoading = false;
                });
        },
    }
}
</script>
<template x-if="selPage == 'home'">
    <section class="section" x-data="RegComp()">
        <div class="card" >
            <header class="card-header" @click="open = !open">
                <p class="card-header-title">
                    Click here to add new stock to the watch list
                </p>
                <button class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i :class="open ? 'fas fa-angle-up' : 'fas fa-angle-down'"></i>
                    </span>
                </button>
            </header>
            <div class="card-content">
                <div class="content">            
                <template x-if="open">
            <form @submit.prevent="submitForm">
                <div class="field">
                    <label class="label">Name:</label>
                    <input class="input" type="text" name="name" required x-model="formData.name" />
                </div>
                <div class="field">
                    <label class="label">email:</label>
                    <input class="input" type="email" name="name" required x-model="formData.email" />
                </div>
                <div class="field">
                    <label class="label">password:</label>
                    <input class="input" type="password" name="pwd" required x-model="formData.pwd" />
                </div>
                <div class="field">
                    <label class="label">Ticker:</label>
                    <input class="input" type="text" name="nameticker" required x-model="formData.ticker" />
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button :disabled="formLoading" class="button is-link">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">Cancel</button>
                    </div>
                    <div class="control">
                        <button class="button is-primary is-light is-small">Request password</button>
                    </div>
                </div>

            </form>
            <div x-text="formMessage"></div>
        </template>


                </div>
            </div>
        </div>

</template>

</section>
</template>

<template x-if="selPage == 'home'">
    <section class="section" x-data="SLComp()" x-init="fetchInfo()">
        <div class="container">
            <div class="content">
                <table class="table is-striped">
                    <thead>
                        <tr>
                            <th><abbr title="Ticker">Ticker</abbr></th>
                            <th><abbr title="FirstClose">FirstClose</abbr></th>
                            <th><abbr title="StopLoss">StopLoss</abbr></th>
                            <th><abbr title="LastClose">LastClose</abbr></th>
                            <th><abbr title="Level">Level</abbr></th>
                            <th><abbr title="CreatedAT">CreatedAT</abbr></th>
                            <th><abbr title="LastUpdated">LastUpdated</abbr></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="rec in stocks" :key="rec.ticker">
                            <tr>
                                <td><span x-text="rec.ticker">Ticker</span></td>
                                <td><span x-text="rec.first_close">first_close</span></td>
                                <td><span x-text="rec.stop_loss">stop_loss</span></td>
                                <td><span x-text="rec.last_close">last_close</span></td>
                                <td><span x-text="rec.level">level</span>
                                    <i class="fa-regular fa-thumbs-up"></i>
                                    <i class="fa-regular fa-circle-xmark"></i>
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <i class="fa-solid fa-skull-crossbones"></i>
                                </td>
                                <td><span x-text="rec.created_at">created_at</span></td>
                                <td><span x-text="rec.updated_at">updated_at</span></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</template>
<!--    - - >
    <p>selPage:<span x-text="selPage">p-span</span></p>
< ! - - -->