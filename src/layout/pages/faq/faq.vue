<template>
  <div id="news" class="main">
    <header-sub mainTitle="FAQ"/>

    <el-main class="container">
      <div class="content-layout white">
        <el-row>
          <el-col class="content" :md="24">
            <!-- <el-row>
              <el-col>
                <h2 class="subtitle">FAQ</h2>
              </el-col>
            </el-row> -->
            <el-row>
              <el-col>
                <el-collapse  accordion>

                  <el-collapse-item title="What is the mission of Orange Fab?" name="1">
                    <p>
                      Orange FAB Belux is the mature start-up accelerator from Orange covering Belgium and Luxembourg.
                      <br>The mission of Orange Fab in Belgium & Luxembourg is to deploy locally relevant innovations through local partnerships in order to support the start-up’s ecosystem in its international expansion.
                    </p>
                  </el-collapse-item>

                  <el-collapse-item title="What differentiates Orange FAB from other accelerators or incubators?" name="2">
                    <p>
                      Orange FAB aims to help entrepreneurs quickly scale their business.
                      <br>There are 5 differentiating factors:
                    </p>
                    <ul>
                      <li><strong>Networking & distribution:</strong> in terms of commercial acceleration you can directly leverage our sales channels (both B2C & B2B) and our customer bases.</li>
                      <li><strong>Mentoring & training:</strong> internal and external start-up coaches and sector-specific experts will coach you in your commercial acceleration to help scale your business within the shortest possible time span.</li>
                      <li><strong>International:</strong> we are part of a global start-up programme established in 14 different countries and a brand active in 29 countries.</li>
                      <li><strong>Events:</strong> during your acceleration your business will benefit from exposure at multiple well-known events, facilitated and funded by Orange, both at home and abroad.</li>
                      <li><strong>Collaboration workspace:</strong> if you are in need of a work environment, Orange can provide a collaborative area in its Brussels headquarters.</li>
                    </ul>
                    <p>Above all, this is also a human experience powered by Orange team members. Throughout your acceleration you will benefit from our team members’ expertise. Challenging but enriching, you will quickly grow, learn and have a step back on your activities. </p>
                  </el-collapse-item>

                  <el-collapse-item title="How long does the acceleration take?" name="3">
                    <p>The acceleration takes 3 to 9 months depending on the entrepreneur’s expectations.</p>
                  </el-collapse-item>

                  <el-collapse-item title="Is it a bespoke programme?" name="4">
                    <p>Yes, the programme is entirely bespoke. We are kicking off the programme with a two-day Boot Camp during which the start-ups will attend different workshops with their start-up coaches. Therefore the acceleration objectives will be identified together with the entrepreneur depending on his needs and the objectives of Orange. This will also enable the different stakeholders to get to know each other and familiarise themselves with the business model.</p>
                  </el-collapse-item>

                  <el-collapse-item title="What is the selection process?" name="5">
                    <p>The application process ends mid-May when the innovation team will preselect the 20 start-ups that best fit in with the corporate venturing strategy. Subsequently a committee of directors will select 10 start-ups that will ultimately get to pitch. At the end of June the executive committee will narrow this down to 3 start-ups for the acceleration of season 3.</p>
                  </el-collapse-item>

                  <el-collapse-item title="What type of start-ups are we looking for?" name="6">
                    <p>We are looking for mature start-ups in tech sectors. The ideal candidate is a tech start-up that already has an MVP and at least one client. We are not looking for entrepreneurs who are starting a business since our start-up accelerator is not suited for a “how to start a start-up” scenario.</p>
                  </el-collapse-item>

                  <el-collapse-item title="Is funding provided?" name="7">
                    <p>Our start-up accelerator is not active in the start-up financing business but we have strong connections with business angels & angel investors for any type of start-up. In addition, we are linked with angel investment networks in Belgium in case you are really looking for equity.</p>
                  </el-collapse-item>

                  <el-collapse-item title="What is the financial contribution of the start-ups?" name="8">
                    <p>Nothing. Orange fab is a free programme so you do not have to contribute equity. Orange Fab is not an investment platform but the Orange Group does include a funding platform: Orange Digital Ventures.</p>
                  </el-collapse-item>
                </el-collapse>
              </el-col>
            </el-row>
          </el-col>
        </el-row>
      </div>
    </el-main>
  </div>
</template>

<script>
import headerSub from "../../components/headerSub.vue";
export default {
  name: "faqLayout",
  components: {
    headerSub
  },
  data() {
    return {
      activeNames: ["1"]
    };
  }
};
</script>
